//Funciones

//login
function login(){
	var usr = $("#email").val();
	var psw = $("#password").val();

	if(usr != "" || psw != ""){
		$.ajax({			
			url: "../class/login.php",			
			dataType: "json",			
			type: "POST",			
			data: {opt:"login", usr: usr, psw: psw},			
			success: function(data){		
				if(data.res==true){					
					$(location).attr('href',data.mes);
				}
				else{
					alert(data.mes)
				}
			}
		});
	}
	else{
		alert("empty username and password");
	}
}

$("#bt_enviar").on("click", function(){
	login();
});

$(document).ready(function(){
	$('#password').keypress(function(e){   
	   if(e.which == 13){      
	     login();
	   }   
	});   	
});

//logout
$("#bt_logout").on("click", function(){
	var c = confirm("Are you sure to want to leave this lovely place?");
	if(c){
		$.ajax({			
			url: "../class/logout.php",			
			dataType: "json",			
			type: "POST",
			success: function(data){
				$(location).attr('href',data.mes);
			}
		});
	}
});

//new book
function add_book(){
	var title = $("#title").val();
	var isbn = $("#isbn").val();
	var autor = $("#autor").val();
	var genre = $("#genre").val();
	var release = $("#release").val();

	if(title != "" || isbn != "" || autor != "" || genre != "" || release != ""){
		$.ajax({			
			url: "../class/core.php",			
			dataType: "json",			
			type: "POST",			
			data: {
					opt:"add", 
					title: title,
					isbn: isbn,
					autor: autor,
					genre: genre,
					release: release
				},			
			success: function(data){		
				if(data.res==true){					
					alert(data.mes);
					location.reload();
				}
				else{
					alert(data.mes);
				}
			}
		});
	}
	else{
		alert("There are one or more fields empty, please check and try again");
	}
}
$("#save_new_book").on("click", function(){
	add_book();
});

$(document).ready(function(){
	$('#release').keypress(function(e){   
	   if(e.which == 13){      
	     add_book();
	   }   
	});   	
});

//list book
function list_book(){
	$.ajax({			
		url: "../class/core.php",			
		dataType: "json",			
		type: "POST",			
		data: {
				opt:"list"
			},			
		success: function(data){		
			if(data.res==true){					
				$("#booklist").empty();
				$("#booklist").html(data.mes);
			}
			else{
				alert(data.mes);
			}
		}
	});
}
$(document).ready(function(){
	list_book();   	
});

//edit book
function edit_book(id, obj){
	$("#edit_book").modal();
	$.ajax({			
		url: "../class/core.php",			
		dataType: "json",			
		type: "POST",			
		data: {
				opt:"get_bookdata",
				id: id
			},			
		success: function(data){		
			if(data.res==true){	
				$("#title_edit").val(data.t);
				$("#isbn_edit").val(data.i);
				$("#autor_edit").val(data.a);
				$("#genre_edit").val(data.g);
				$("#release_edit").val(data.r);
				$("#id_book").val(data.id_book);
			}
			else{
				alert(data.mes);
			}
		}
	});
}

function save_edit_book(){
	var title = $("#title_edit").val();
	var isbn = $("#isbn_edit").val();
	var autor = $("#autor_edit").val();
	var genre = $("#genre_edit").val();
	var release = $("#release_edit").val();
	var id_book = $("#id_book").val();

	if(title != "" || isbn != "" || autor != "" || genre != "" || release != ""){
		$.ajax({			
			url: "../class/core.php",			
			dataType: "json",			
			type: "POST",			
			data: {
					opt:"edit", 
					title: title,
					isbn: isbn,
					autor: autor,
					genre: genre,
					release: release,
					id_book: id_book
				},			
			success: function(data){		
				if(data.res==true){					
					alert(data.mes);
					location.reload();
				}
				else{
					alert(data.mes);
				}
			}
		});
	}
	else{
		alert("There are one or more fields empty, please check and try again");
	}
}
$("#save_old_book").on("click", function(){
	save_edit_book();
});

$(document).ready(function(){
	$('#release_edit').keypress(function(e){   
	   if(e.which == 13){      
	     edit_book();
	   }   
	});   	
});
//delete book
function delete_book(id, obj){
	$.ajax({			
		url: "../class/core.php",			
		dataType: "json",			
		type: "POST",			
		data: {
				opt:"delete",
				id: id
			},			
		success: function(data){		
			if(data.res==true){
				alert(data.mes);
				$(obj).closest('tr').fadeOut();
			}
			else{
				alert(data.mes);
			}
		}
	});
}
