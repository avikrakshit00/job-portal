// editor
var oDoc, sDefTxt;
    function initDoc() {
    oDoc = document.getElementById("textBox");
    sDefTxt = oDoc.innerHTML;
    if (document.compForm.switchMode.checked) { setDocMode(true); }
    }
    function formatDoc(sCmd, sValue) {
    if (validateMode()) { document.execCommand(sCmd, false, sValue); oDoc.focus(); }
    }
    function validateMode() {
    if (!document.compForm.switchMode.checked) { return true ; }
    alert("Uncheck \"Show HTML\".");
    oDoc.focus();
    return false;
    }
    function setDocMode(bToSource) {
    var oContent;
    if (bToSource) {
    oContent = document.createTextNode(oDoc.innerHTML);
    oDoc.innerHTML = "";
    var oPre = document.createElement("pre");
    oDoc.contentEditable = false;
    oPre.id = "sourceText";
    oPre.contentEditable = true;
    oPre.appendChild(oContent);
    oDoc.appendChild(oPre);
    document.execCommand("defaultParagraphSeparator", false, "div");
    } else {
    if (document.all) {
    oDoc.innerHTML = oDoc.innerText;
    } else {
    oContent = document.createRange();
    oContent.selectNodeContents(oDoc.firstChild);
    oDoc.innerHTML = oContent.toString();
    }
    oDoc.contentEditable = true;
    }
    oDoc.focus();
    }
	


// animate placeholder
$(document).ready(function () {
	$(".welcome-form-input").each(function(){
	$(this).click(function() {
	// remove placeholder
	$(this).attr("placeholder","");
	//show label
	var parent = this.parentElement;
	var label = parent.getElementsByTagName('LABEL')[0];
	$(label).removeClass('d-none');
	$(label).addClass('animate__animated animate__backInUp');
	});
});
// collapse bashboard
$('#sidebarCollapse').on('click', function () {
	$('#sidebar').toggleClass('active');
	if($('#sidebar').hasClass('active')){
	$(".logo-shivila").html("S");}
	else{$(".logo-shivila").html("SHIVILA");}
	});
	$('.js-fullheight').css('height', $(window).height());
	$(window).resize(function(){
	$('.js-fullheight').css('height', $(window).height());
	});
});

$(document).on('click','.more-fetch-data',function(e){
	e.preventDefault();
	fetchData()
});

function fetchData(){
	$.ajax({
		type: "GET",
		url : "/fetchDataPresanalDetails",
		dataType:"json",
		data : {
			_token : $("body").attr("token")
		},
		beforeSend:function (){
			$(".loader-icon").removeClass('d-none');
		},
		success: function(response)
		{	
			$(".loader-icon").addClass('d-none');
			$(".showUserAll").removeClass('d-none'); 
			$('tbody').html("")
			$.each(response.Personal_details, function(index, value) {
	  		$('tbody').append('<tr>\
			    <td>'+value.id+'</td>\
			    <td class="d-flex justify-content-center">\
			      <div class="card img-fluid " style="width:75px">\
			        <img class="card-img-top p-2 user-img-pra-det" src="./img/user_img.png" alt="Card image" style="width:70px">\
			      </div>\
			    </td>\
			    <td class="name_user">'+value.name+'</td>\
			    <td class="email_user">'+value.email+'</td>\
			    <td class="mobile-update">'+value.mobile+'</td>\
			    <td><button type="button" value="'+value.id+'" class="view-user btn btn-danger btn-sm" data-toggle="modal" data-target="#view_profile_modal">View</button>\
			<button type="button" value="'+value.id+'" id="edit-user" class=" btn btn-primary  btn-sm">EDIT</button>\
			<button type="button" value="'+value.id+'" class="show-delete-user btn btn-danger btn-sm delete_user_btn" data-toggle="modal" data-target="#deleteuser">DELETE</button></td>\
			  </tr>')
			});

		}
	});
}
//update_user
$(document).on('click','#update_user',function(e){
	e.preventDefault();
	var input = document.getElementsByClassName("require");
	var tmp = [];
	$(input).each(function(i){
		if($(this).val().trim() == "")
		{	
			if(this.nextSibling.nodeName == "SMALL")
			{
				this.nextSibling.remove();
			}
			
				$(this).addClass('border-danger');
				$('<small class="text-danger required-notice"> <i class="fa fa-warning"></i> this can`t empty</small>').insertAfter(this);
		}

		else{
			tmp[i] = $(this).val().trim();
		}
	});
	$(input).each(function (){
		$(this).on("input",function(){
			if(this.nextSibling.nodeName == "SMALL")
			{
				this.nextSibling.remove();
				$(this).removeClass('border-danger');
			}
		}) 
	})


	if(tmp.length == input.length && $(".required-notice").length == 0)
	{
		update_user();
	}
});

function update_user() {
	var userUpdateId = $("#update_user").val();
	var data = {
	    'name'  :  $(".user_name").val(),
	    'dob'   : $(".user_dob").val(),
	    'age'   : $(".user_age").val(),
	    'gender'  : 	$(".user_gender").val(),
	    'location' :   $(".user_location").val(),
	    'qulification'  :  $(".user_qulification").val(),
	    'specialization'  :  $(".user_specialization").val(),
	    'skills'  :  $(".user_skills").val(),
	    'other_skills'   : $(".user_other_skills").val(),
	    'mobile'   : $(".user_mobile").val(),
	    'email'   :	$(".user_email").val(),
	    'image'   :	$(".user_image").val()
	}
	$.ajax({
		  type: 'GET',
		  url: '/update_user/'+userUpdateId,
		  data : data,
		  dataType : 'json',
		  beforeSend:function (){
			$(".loader-icon").removeClass('d-none');
		  },
		  success: function(data, response) {
		  	
		  	if(data.status == 200)
		  	{
		  		$(".loader-icon").addClass('d-none');
		  		fetchData();
		  		$(".loader").append('<div class="loader-icon w-25 alert alert-success">\
		  			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\
				  <strong>Success!</strong> Update Successfull.\
				</div>');
				$('#edit_user_model').modal('hide');

				
		  		
		  	}
		  }
	});
}
//delete-user show popp
$(document).on('click','.show-delete-user',function(e){
	e.preventDefault();
	$("#delete-user").val($(this).val());
	var userDeleteId = $(this).val();
	var tr = this.parentElement.parentElement;
	var name_input = tr.querySelector('.name_user');
	var email_input = tr.querySelector('.email_user');
	$(".delete_username").val($(name_input).html());
	$(".delete_useremail").val($(email_input).html());
});
// delete user
$(document).on('click','#delete-user',function()
	{
		$.ajax({
		  type: 'GET',
		  url: '/delete_user/'+this.value,
		  dataType : 'json',
		  beforeSend:function (){
			$(".loader-icon").removeClass('d-none');
		  },
		  success: function(data, response) {

		  	
		  	$(".loader-icon").addClass('d-none');
		  	alert(data.delete_user);
		  	fetchData()
		  }
		});
})
//view user 
$(document).on('click','.view-user',function(e){
	e.preventDefault();

	var userId = $(this).val();
	
	$.ajax({
	  type: 'GET',
	  url: '/edit_user/'+userId,
	  beforeSend:function (){
		$(".loader-icon").removeClass('d-none');
	  },
	  success: function(data, response) {
	  	$('.user_show_detils').html()
	  	console.log(data.edit_Personal_details);
	  	if(data.status == 200)
	  	{	var val = data.edit_Personal_details;
	  		$('.user_show_detils').append('<div class="modal fade" id="view_profile_modal">\
		          <div class="modal-dialog modal-dialog-centered modal-lg">\
		            <div class="modal-content p-3">\
		              <div class="d-flex flex-row justify-content-around">\
		                <div class="mt-4">\
		                  <img src="img/user_img.png" alt="" style="width:130px">\
		                </div>\
		                <div class="user-personal-details">\
		                  <h5>Personal Details</h5>\
		                  <p>NAME : '+val.name+'</p>\
		                  <p>DOB : '+val.dob+'</p>\
		                  <p> Mobile : '+val.mobile+'</p>\
		                  <p>EMAIL : '+val.email+'</p>\
		                   <p>Gender : '+val.gender+'</p>\
		                </div>\
		              </div>\
		              <div class="row ">\
		                <div class="col-6">\
		                    <h6 class="bg-secondary p-2 text-white">Qualification</h6>\
		                    <p>'+val.qualification+'</p>\
		                    <h6 class="bg-secondary p-2 text-white">Skills</h6>\
		                    <p>'+val.skills+'</p>\
		                </div>\
		                <div class="col-6">\
		                    <h6 class="bg-secondary p-2 text-white">Specialization</h6>\
		                    <p>'+val.specialization+'</p>\
		                    <h6 class="bg-secondary p-2 text-white">Other Skills</h6>\
		                    <p>'+val.other_skills+' </p>\
		                </div>\
		              </div>\
		              <h6 class="bg-secondary p-2 text-white">Location</h6>\
		                <p> '+val.location+'</p>\
		            </div>\
		          </div>\
		        </div>')
	  		$(".loader-icon").addClass('d-none');
	  		
	  	}
	  }
	});
});
// edit_user 
$(document).on('click','#edit-user',function(e){
	$('#edit_user_model').modal('show');
	e.preventDefault();
	var userId = $(this).val();
	
	$.ajax({
	  type: 'GET',
	  url: '/edit_user/'+userId,
	  beforeSend:function (){
		$(".loader-icon").removeClass('d-none');
	  },
	  success: function(data, response) {
	  	
	  	if(data.status == 200)

	  	{	
	  		
	  		var val = data.edit_Personal_details;
	  		$(".loader-icon").addClass('d-none');
			$(".user_id ").val(val.id); 
	        $(".user_name").val(val.name);
	        $(".user_dob").val(val.dob);
	        $(".user_age").val(val.age);
	       	$(".user_gender").val(val.gender);
	        $(".user_location").val(val.location);
	        $(".user_qulification").val(val.qualification); 
	        $(".user_specialization").val(val.specialization);
	        $(".user_skills").val(val.skills);
	        $(".user_other_skills").val(val.other_skills);
	        $(".user_mobile").val(val.mobile);
	       	$(".user_email").val(val.email);
	       	$(".user_image").val(val.image);
	  		
	  	}
	  }
	});
});




