<div class="sidebox">
    <ul>
        <li><a href="home.php"><i class="fas fa-home"></i>Home</a></li>
        <? if(isset($_SESSION['email'])):?>
            <? if($_SESSION['email'] == 'admin@project2.com'):?>
                <li><a href="new_contact.php"><i class="side"></i>New Contact</a></li>
                <li><a href="adduser.php"><i class="side"></i>Add User</a></li>
            <? endif; ?>
        <? endif; ?>
       
        <li class="last"><a href=""><i class="side-off"></i>Logout</a></li>
    </ul>
</div>