$(document).ready(function() {
			liked();
		});
function liked(userid, postid){
			var formdate={liked:'n', postid: postid, userid: userid};
  			$.post("/model/profile/getsetlikes.php",formdate,
   				function(data){
    				if(data!="errorlikeadded"){
    					var like="#like"+postid;//solo funciona con esta variable
    					$(like).text(data);
    					if (data=='1'){
							$(like).attr("class", "ri-lifebuoy-fill"); //suma la accion de like en tiempo real modificando el dom
    					}
    					if (data=='0'){
							$(like).attr("class", "ri-dislike-fill"); //suma la accion de like en tiempo real modificando el dom
    					}
    				}
   			});				
		}