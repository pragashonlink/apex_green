<ul class="section menu">
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php"img src="img/img-profile.jpg">
            <img src="img/house.png" alt="Profile Pic" />
            <label>Home</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=NEW">
            <img src="img/cl.png" alt="Profile Pic" />
            <label>New Jobs</label>
        </a>
    </li><!--<li>
        <a class="menuitem" style="font-size: 12px !important; " href="create_lead.php">
            <img src="img/cl.png" alt="Profile Pic" />
            <label>New Entry</label>
        </a>
    </li>-->

    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=COMP">
            <img src="img/comp.png" alt="Profile Pic" />
            <label>Completed</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=INST">
            <img src="img/cons.ico" alt="Profile Pic" />
            <label>Installation</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="display_cal.php?status=INST">
            <img src="img/cal.png" alt="Profile Pic" />
            <label>Installation Calender</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=ASMT">
            <img src="img/asmt.png" alt="Profile Pic" />
            <label>Assesments</label>
        </a>
    </li>
    <li>
        <a class="menuitem"style="font-size: 12px !important; " href="display_cal.php?status=ASMT">
            <img src="img/cal.png" alt="Profile Pic" />
            <label>Assesments Calender</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=QULI">
            <img src="img/ql.png" alt="Profile Pic" />
            <label>Qualified</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=RDTB">
            <img src="img/rdtb.png" alt="Profile Pic" />
            <label>Heating</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=MISSED">
            <img src="img/cons.ico" alt="Profile Pic" />
            <label>Missed Jobs</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=VC">
            <img src="img/house.png" alt="Profile Pic" />
            <label>Visit Completed</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=UTA">
            <img src="img/utc.png" alt="Profile Pic" />
            <label>Unable to Contact</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=CBNR">
            <img src="img/house.png" alt="Profile Pic" />
            <label>Call back not Ready</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=REM">
            <img src="img/clock.jpg" alt="Profile Pic" />
            <label>Reminders</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=ICOM">
            <img src="img/cros.jpg" alt="Profile Pic" />
            <label>Area not Covered</label>
        </a>
    </li>
    <li>
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=RJCT">
            <img src="img/cros.jpg" alt="Profile Pic" />
            <label>Rejection</label>
        </a>
    </li>
    <li img src="img/img-profile.jpg" alt="Profile Pic">
        <a class="menuitem" style="font-size: 12px !important; " href="index.php?status=RAA">
            <img src="img/house.png" alt="Profile Pic" />
            <label>Rejection after Assessment</label>
        </a>
    </li>
    <?php
    $role = $_SESSION["role"];
    if($role == 'ADMIN') {
    ?>
        <li>
            <a class="menuitem" style="font-size: 12px !important; ">
                <img src="img/user.gif" alt="Profile Pic" />
                <label>User</label>
            </a>
            <ul class="submenu">
                <li>
                    <a class="menuitem" style="font-size: 12px !important; " href="create_user.php">
                        <img src="img/user_add.png" alt="Profile Pic" />
                        <label>Create User</label>
                    </a>
                </li>
                <li>
                    <a class="menuitem" style="font-size: 12px !important; " href="create_leadsource.php">
                        <img src="img/user_add.png" alt="Profile Pic" />
                        <label>Create External Assessor</label>
                    </a>
                </li>
                <li>
                    <a class="menuitem" style="font-size: 12px !important; " href="user_list.php">
                        <img src="img/user_list.png" alt="Profile Pic" />
                        <label>User List</label>
                    </a>
                </li>
                <li>
                    <a class="menuitem" style="font-size: 12px !important; " href="leadsource_list.php">
                        <img src="img/user_list.png" alt="Profile Pic" />
                        <label>External Assessor List</label>
                    </a>
                </li>
            </ul>
        </li>
    <?php
    }
    ?>

</ul>