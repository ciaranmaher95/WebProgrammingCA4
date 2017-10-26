//$('#signupForm').submit(function (e) {
//alert('1');
//         e.preventDefault();
//                alert('2');
//            var formData1 = new FormData($(this)[0]);
//                alert('3');
//                $.ajax({
//                    url: "http://notfakenewsblogie.000webhostapp.com/includes/addusers.php",
//                    type: "POST",
//                    data: formData1,
//                    async: false,
//                    success: function () {
//                               alert('success'); 
//},
//                    error: function (data) {
//                               alert(data);
//                    },
//                    contentType: false,
//                    processData: false
//
//                   
//                });
//
//            });
//
//$('#updateForm').submit(function (e) {
//
//         e.preventDefault();
//                
//            var formData2 = new FormData($(this)[0]);
//                
//                $.ajax({
//                    url: "http://notfakenewsblogie.000webhostapp.com/includes/updateAvatar.php",
//                    type: "POST",
//                    data: formData2,
//                    async: false,
//                    success: function () {
//                        
//
//                    },
//                    error: function () {
//                    },
//                    cache: false,
//                    contentType: false,
//                    processData: false
//                });
//            });
//            
//     $('#articleForm').submit(function (e) {
//
//         e.preventDefault();
//                
//            var formData3 = new FormData($(this)[0]);
//                
//                $.ajax({
//                    url: "http://notfakenewsblogie.000webhostapp.com/addArticle.php",
//                    type: "POST",
//                    data: formData3,
//                    async: false,
//                    success: function () {
//                        
//
//                    },
//                    error: function () {
//                    },
//                    cache: false,
//                    contentType: false,
//                    processData: false
//                });
//            });