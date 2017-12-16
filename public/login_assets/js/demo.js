 (function(){
         
         var $button = $("<div class='source-btn-main'><div id='source-button' class='btn btn-default btn-xs'>&lt; &gt;</div></div>").click(function(){
           var html = $(this).parent().html();
           html = cleanSource(html);
           $("#source-modal pre").text(html);
           $("#source-modal").modal();
         });
         
         $('.bs-example [data-toggle="popover"]').popover();
         $('.bs-example [data-toggle="tooltip"]').tooltip();
         
		 
		 $( document ).ready(function() {
			console.log( "ready!" );
		});
		 
         $(".bs-example").hover(function(){
           $(this).append($button);
           $button.show();
         }, function(){
           $button.hide();
         });
         
         function cleanSource(html) {
           var lines = html.split(/\n/);
         
           lines.shift();
           lines.splice(-1, 1);
         
           var indentSize = lines[0].length - lines[0].trim().length,
               re = new RegExp(" {" + indentSize + "}");
         
           lines = lines.map(function(line){
             if (line.match(re)) {
               line = line.substring(indentSize);
             }
         
             return line;
           });
         
           lines = lines.join("\n");
         
           return lines;
         }
         
         })();
         