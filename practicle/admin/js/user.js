function changeStatus(id,status)
{
	if(status==0)
	{
		status = 'deactive';
	}
	else
	{
		status = "active";
	}

	$.ajax({
  		url: "common.php?id="+id+"&function="+status,
  		cache: false,
  		success: function(response){
  			 
  			var results = response.split("******");
    		$("#msg").html(results[0]);
    		$("#user_status_"+id).html(results[1]);
  		}
	});
}