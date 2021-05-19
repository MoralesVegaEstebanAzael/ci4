//

// import {data} from "models/records";

import {JetView} from "webix-jet";

// export default class DataView extends JetView{
// 	config(){
// 		return { view:"datatable", autoConfig:true, css:"webix_shadow_medium" };
// 	}
// 	init(view){
//
// 		view.parse(data);
// 	}
// }



export default class DataView extends JetView {
	config() {
		// console.log("data view.. url " + <?php echo base_url()?>); //'<?php echo base_url()?>'/task
		// return webix.ajax(
		// 	"http://localhost:8080/task").then(function(data){
		// 	data = data.json();
		// 	console.log("data.. " + data['tasks']);

		return webix.ajax().get("http://localhost:8080/task").then(function(data){
			console.log(data);
			data = data.json();

			var data = {
				"tasks": [
					{
						"id": "3",
						"title": "update title",
						"description": "update description",
						"deleted_at": null
					}
				]
			};
			console.log("data*** " + data['tasks'].toString());
			// if(data['tasks']){
			// 	location.href ="/dashboard";
			// }else{
			// 	webix.message({
			// 		text:data['message'],
			// 		type:"error",
			// 		expire: 10000,
			// 		id:"message1"
			// 	});
			// }
			//
			// $$("log_form").hideProgress({
			// 	type:"icon",
			// 	hide:true
			// });
			return {
				view:"datatable",
				columns:[{ header:["id"]},{ header:["title"]},{ header:["description"]}],
				data: data

			}

		});
		// 	return {
		// 		view:"datatable",
		// 		columns:[{ header:["id"]},{ header:["title"]},{ header:["description"]}],
		// 		data: d
		//
		// 	}
		// });
	}
}
