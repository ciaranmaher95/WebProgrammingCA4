/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Search Bar on home page
function filter(element) {
        var value = $(element).val();
        
        //search everything in html html <article> tags
        //title, username, date, tags 
        $("article").each(function() {
            if ($(this).text().search(value) > -1) {
                $(this).show();
                
            }
            else {
                $(this).hide();
            }
        });
    }