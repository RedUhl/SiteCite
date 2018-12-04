<?php
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $uname = $_POST['username'];
        $course = $_POST['course'];

        if (strlen($uname)<6) {
            $error[] = "User name must be at least 6 charachters long";
        }
        //course check
        if (strlen($course)<6) {
            $error[] = "Password must be at least 6 charachters long";
        }
        
        try {
            $stmnt = $pdo->prepare("SELECT username FROM users WHERE username = :username");
            $user_data = [':username'=>$uname];
            $stmnt->execute($user_data);
            if ($stmnt->rowCount()>0) {
                $error[] = "Username '{$uname}' already exists";
            }
        } catch(PDOException $e) {
            echo "Error: {$e->getMessage()}";
        }
        
        } else {
            $uname="";
            $course="";
        }
?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <div class="container">
    	    <div class="row">
			    <div class="col-md-6 col-md-offset-3">
				    <div class="panel panel-login">
					    <div class="panel-body">
						    <div class="row">
							    <div class="col-lg-12">
								    <form id="login-form"  method="post" role="form" style="display: block;">
									    <div class="form-group">
										    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" required>
									    </div>
									    <div class="form-group">
										    <!-- <input type="course" name="course" id="course" tabindex="2" class="form-control" placeholder="Course" required> -->
                                            <select class="">
                                            <option value="volvo">Volvo</option>
                                            <option value="saab">Saab</option>
                                            <option value="opel">Opel</option>
                                            <option value="audi">Audi</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-custom" value="Log In">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>