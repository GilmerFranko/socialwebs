function liked(userid, postid){
			var formdate={liked:'n', postid: postid, userid: userid};
  			$.post("/model/profile/getsetlikes.php",formdate,
   				function(data){
    				if(data!="errorlikeadded"){
    					var like="#like"+postid;//solo funciona con esta variable
    					$(like).text(data); //suma la accion de like en tiempo real modificando el dom
    				}
   			});				
		}