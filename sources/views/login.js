import {JetView} from "webix-jet";

export default class LoginView extends JetView{
    config(){
        return {
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
                                                    { view:"button", value:"Login" , css:"webix_primary",
                                                        click:()=>{
                                                             this.app.show("dashboard/start")
                                                            // this.app.show("/hi");

                                                        }},

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
                                                    { view:"button", value:"Registrarme" , css:"webix_primary", click:()=>{this.app.show("top")}},

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

        };
    }
}