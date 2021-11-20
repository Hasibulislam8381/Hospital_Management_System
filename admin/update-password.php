<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                   <td>Current Password</td>
                   <td>
                       <input type="password" name="current_password" placeholder="old password">
                   </td>

                </tr>
                <tr>
                    <td>New password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Passwprd">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Change Password">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php') ?>