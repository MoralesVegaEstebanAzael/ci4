
var menu_data = [
    { view:"icon", icon:"mdi mdi-food-apple",value:"Productos",
        // data:[
        //     { id: "add", value: "Accordions"},
        //     { id: "portlets", value: "Portlets"}
        // ]
    },
    { view:"icon", icon:"mdi mdi-account",value:"Usuarios",data:[

        ]},

    // ...
];

webix.ui({
    rows: [
        { view: "toolbar",title:"My App", css: "webix_dark", elements: [

                { view:"icon",
                    icon:"mdi mdi-menu",
                    value:"Option1",
                    align: "left",
                    click: function(){
                        $$("$sidebar1").toggle()
                    }

                },

            ]},
        {
            cols:[
                {
                    view: "sidebar",
                    css:"webix_dark",
                    data: menu_data
                },
                {
                    template: ""
                }
            ]
        },

    ]
});