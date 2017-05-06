$(document).ready(function showdata(){
			$.getJSON('./php/connect.php?action=list',function(res){
			$.each(res,function(i,item){
				var td = "<tr>";
				td += "<td>"+item.word1+"</td>";
				td += "<td>"+item.word2+"</td>";
				td += "<td>"+item.word3+"</td>";
				td += "<td>"+item.word4+"</td>";
				td +="<td><a href=''>修改</a><a href='#' id='del'>删除</a>";
				
				td += "</td></tr>";
			 $(td).appendTo("#jsontable");
			
			
		});
	

	$("#plus").on("click",function(){
		var add = "<tr><form action='./php/connect.php?action=plus' method='post' id='formid'>";
		for(var i = 1; i < 5;i++)
			add += "<td><input type='text' id='word_"+i+"' name='word"+i+"' size='10' form='formid'></td>";

		add +="<td><input type='submit' value='添加' id='plusdata' form='formid'></td></tr>"
			$(add).appendTo("#jsontable");
			$("plusdata").on('click',function(){showdata();})
	});
});$("#del").on("click",function(){
				//data = {"id":item.id};
		$.get('./php/connect.php?action=del&id='+item.id,function(){});
	});
});