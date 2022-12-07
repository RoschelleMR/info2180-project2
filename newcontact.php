<html>
<head>
    <link rel = "stylesheet" href ="new_contact.css"> 
</head>
<?php include "header.php"?>
<body>
    <main>
        <div class = 'result'></div>
        <section class="form_section">
            <div class="main_container">
                <h2>New Contact</h2>
                <form action="newcontact.php" method="post">
                    <div class="form_div">
                        <div class="title_div">
                            <label>Title...</label>
                            <select name="title" id="title" required>
                                <option selected hidden>Title</option>
                                <option value="Ms">Ms</option>
                                <option value="Miss">Miss</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Mr">Mr</option>
                            </select>
                        </div>
                    </div>
                    <div class="form_div">
                        <div class="firstname_div">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" id="firstname" value="" placeholder="Enter Your First Name..." required>
                        </div>
                        <div>
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname" value="" placeholder="Enter Your Last Name..." required>
                        </div>
                    </div>
                    <div class="form_div">
                        <div class="email_div">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="" placeholder="Enter Your Email..." required>
                        </div>
                        <div class="telephone_div">
                            <label for="telephone">Telephone</label>
                            <input type="tel" name="telephone" id="telephone" value="" placeholder="Enter Your Telephone Number..." required>
                        </div>
                    </div>
                    <div class="form_div">
                        <div class="company_div">
                            <label for="company">Company</label>
                            <input type="text" name="company" id="company" value="" placeholder="Enter A Company....." required>
                        </div>
                        <div class="type_div">
                            <label for="type">Type</label>
                            <select name="type" id="type" required>
                                <option selected hidden>Type...</option>
                                <option value="sales lead">Sales Lead</option>
                                <option value="support">Support</option>
                            </select>
                        </div>
                    </div>
                    <div clas="form_div">
                        <div class="assign_div">
                            <label for="assign">Assigned To|| Needs to fix</label>
                            <select name="assign" id="assign" required>
                                <option selected hidden>Select...</option>
                                    <?php 
                                    include 'server.php';
                                    $query = "SELECT id, firstname, lastname FROM users";
                                    $stmt = $conn->query($query);
                                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <?php foreach ($users as $user):?>
                                        <option><?= $user['id'].' '. $user['firstname'].' '. $user['lastname']; ?></option>
                                    <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form_div">
                        <div class="btn_div">
                            <button type="submit" id="btn" name="save">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="side_bar">
            <div class="container">
                <nav>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="new_contact.php">New Contact</a></li>
                        <li><a href="users.php">Users</a></li>
                        <hr>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </section>
    </main>

    <div class="container">
        <?php include "footer.php" ?>
    </div>
    <script src="jquery-3.6.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function(){
            $('#btn').click(function(e){

                let valid = this.form.checkValidity();
                if (valid){

                    let title = $('#title').val();
                    let firstname = $('#firstname').val();
                    let lastname = $('#lastname').val();
                    let email = $('#email').val();
                    let telephone = $('#telephone').val();
                    let company = $('#company').val();
                    let type = $('#type').val();
                    let assign = $('#assign').val();

                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'values.php',
                        data: {title: title, firstname: firstname, lastname: lastname, email: email, telephone: telephone, company: company, type: type, assign: assign},
                        //data: {title, firstname, lastname, email, telephone, company, type, assign},
                        success: function(data){
                            Swal.fire('Updated',
                            'User was successfully added to database',
                            'success');
                        },
                        error: function(data){
                            Swal.fire('Error',
                            'There was an error adding user to database',
                            'error');
                        }
                    });

                }
                else{
                    Swal.fire('Error',
                        'There was an error validating form',
                        'error');
                }

            });
    
        });
    </script>
</body>
</html>