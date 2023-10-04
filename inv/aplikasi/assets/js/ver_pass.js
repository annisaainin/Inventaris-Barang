        function validatePassword(password) {
                
                // Do not show anything when the length of password is zero.
                if (password.length == 0) {
                    document.getElementById("msg").innerHTML = "";
                    return;
                }
                // Create an array and push all possible values that you want in password
                var matchedCase = new Array();
                matchedCase.push("[$@$!%*#?&_]"); // Special Charector
                matchedCase.push("[A-Z]");      // Uppercase Alpabates
                matchedCase.push("[0-9]");      // Numbers
                matchedCase.push("[a-z]");     // Lowercase Alphabates
                
                // Check the conditions
                var ctr = 0;
                for (var i = 0; i < matchedCase.length; i++) {
                    if (new RegExp(matchedCase[i]).test(password)) {
                        ctr++;
                    }
                }
                // Display it
                var color = "";
                var strength = "";
                switch (ctr) {
                    case 0:
                    case 1:
                    case 2:
                        strength = "<b>Very Weak</b>";
                        color = "red";
                        break;
                    case 3:
                        strength = "<b>Medium</b>";
                        color = "orange";
                        break;
                    case 4:
                        strength = "<b>Strong</b>";
                        color = "green";
                        break;
                    
                }
                document.getElementById("msg").innerHTML = strength;
                document.getElementById("msg").style.color = color;
            }
            
            $(function() {
			$('#jq-pass [type="password"]').keyup(function() {
				var pass = $('#pswda');
				var con = $('#pswdb');
				var mss = $('#con');

				var good = "#66cc66";
				var bad  = "#ff6666";

				if (pass.val() == con.val()) {
					con.css('background-color', good);
					mss.css('color', good).html("<b>Password Match</b>");
				}else{
					con.css('background-color', bad);
					mss.css('color', bad).html("<b>Password Do Not Match</b>");
				}
			})
		});

		$(function() {
			$("#submit").click(function() {
				var pass = $("#pswda").val();
				var con = $("#pswdb").val();
				if (pass!=con) {
					alert("password do not match");
					return false;
				}
				return true; 
			})
		})