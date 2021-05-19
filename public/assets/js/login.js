webix.ui({
    type:"clean",
    rows:[
        {},
        {
            cols:[
                {},
                {
                    height:500,
                    view:"tabview",
                    cells:[
                        {
                            header:"Login",
                            body:{
                                view:"form",
                                id:"log_form",
                                width:400,
                                elementsConfig:{
                                    labelWidth:120,
                                    labelPosition: "top",
                                    bottomPadding: 18
                                },
                                on:{
                                    'onChange':function(newv, oldv){
                                        this.validate();
                                    }
                                },
                                ready:function(){
                                    this.validate();
                                },
                                elements:[
                                    { view:"label",label:"LOGIN",type:"text",align:"center"},
                                    { view:"text",  label:"Correo", name:"email",id:"email",invalidMessage: "Campo requerido"},
                                    { view:"text", type:"password", label:"Contraseña",id:"password", name:"password",invalidMessage: "Campo requerido"},
                                    { margin:10,
                                        cols:[
                                            { view:"button", value:"Login" , css:"webix_primary", click:login},

                                        ]}
                                ],
                                rules:{ // component name is used to apply the rule to it
                                    email : webix.rules.isEmail,
                                    password: webix.rules.isNumber,
                                }
                            }
                        },
                        {
                            header:"Registrarse",
                            body:{
                                view:"form",
                                id:"register_form",
                                width:400,
                                elementsConfig:{
                                    labelWidth:120,
                                    labelPosition: "top",
                                    bottomPadding: 18
                                },
                                on:{
                                    'onChange':function(newv, oldv){
                                        this.validate();
                                    }
                                },
                                ready:function(){
                                    this.validate();
                                },
                                elements:[
                                    { view:"label",label:"REGISTRARSE",type:"text",align:"center"},
                                    { view:"text",  label:"Nombre", name:"name_regis",id:"name_regis",invalidMessage: "Campo requerido"},
                                    { view:"text",  label:"Correo",type:"email", name:"email_regis",id:"email_regis",invalidMessage: "Campo requerido"},
                                    { view:"text",  label:"Celular",  pattern:{ mask:"###-###-####", allow:/[0-9]/g}, name:"phone_regis",id:"phone_regis",invalidMessage: "Campo requerido"},

                                    { view:"text",  label:"Contraseña",name:"password_regis",id:"password_regis", type: "password", css:"webix_el_search", icon:"_showhide wxi-eye",
                                        on:{
                                            onItemClick: function(id, e){
                                                if(e.target.className.indexOf("_showhide") > -1){
                                                    const input = this.getInputNode();
                                                    input.focus();
                                                    webix.html.removeCss(e.target, "wxi-eye-slash");
                                                    webix.html.removeCss(e.target, "wxi-eye");
                                                    if(input.type == "text"){
                                                        webix.html.addCss(e.target, "wxi-eye");
                                                        input.type = "password";
                                                    } else {
                                                        webix.html.addCss(e.target, "wxi-eye-slash");
                                                        input.type = "text";
                                                    }
                                                }
                                            }
                                        }
                                    },

                                    { margin:10,
                                        cols:[
                                            { view:"button", value:"Registrarme" , css:"webix_primary", click:register},

                                        ]}
                                ],
                                rules:{ // component name is used to apply the rule to it
                                    email_regis : webix.rules.isEmail,
                                    password_regis: webix.rules.isNumber,
                                    name_regis:   webix.rules.isNotEmpty,
                                    phone_regis:   webix.rules.isNumber,
                                }
                            }
                        }
                    ],
                    multiview:{
                        animate:true
                    }

                },
                {}
            ]
        },
        {}
    ],

});

webix.extend($$("log_form"), webix.ProgressBar);


function login(){
    let email = $$('email').getValue();
    let password = $$('password').getValue();
    if(webix.rules.isEmail(email)&&webix.rules.isNumber(password)){
        $$("log_form").showProgress({
            type:"icon",
            hide:false
        });
        webix.ajax().post("/login",
            {
                email:email,
                password:password,
            }).then(function(data){
            data = data.json();

            if(data['success']){
                location.href ="/dashboard";
            }else{
                webix.message({
                    text:data['message'],
                    type:"error",
                    expire: 10000,
                    id:"message1"
                });
            }

            $$("log_form").hideProgress({
                type:"icon",
                hide:true
            });

        });
    }else{
        webix.message({
            text:"Campos requeridos",
            type:"error",
            expire: 10000,
            id:"message1"
        });
    }
}


function register() {
    let name = $$('name_regis').getValue();
    let password = $$('password_regis').getValue();
    let phone = $$('phone_regis').getValue();
    let email = $$('email_regis').getValue();

    if(!webix.rules.isEmail(email)&&!webix.rules.isNumber(password)
        &&!webix.rules.isNotEmpty(name)&&!webix.rules.isNumber(phone)){
        webix.message({
            text:"Campos requeridos",
            type:"error",
            expire: 10000,
            id:"message1"
        });
        return;
    }


    webix.ajax().post("/register",
        {
            name : name ,
            password:password,
            phone:phone,
            email:email
        }).then(function(data){
        data = data.json();
        if(data['success']){
            location.href ="/";
        }else{
            webix.message({
                text:data['data']['validation'],
                type:"error",
                expire: 10000,
                id:"message1"
            });
        }
    });
}

