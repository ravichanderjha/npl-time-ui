<?php

    // configuration
    require("../includes/config.php");


    if (isset($_POST["user_transmit_time"]) && isset($_POST["user_receive_time"]) && isset($_POST["ntp_client_transmit_time"]) && isset($_POST["ntp_client_receive_time"]) && isset($_POST["ntp_server_transmit_time"]) && isset($_POST["ntp_server_receive_time"]))
    {
	$results = query("INSERT INTO TIMESTAMP (USER_TRANSMIT, USER_RECEIVE, NTP_CLIENT_TRANSMIT, NTP_CLIENT_RECEIVE, NTP_SERVER_TRANSMIT, NTP_SERVER_RECEIVE,USER_IP) VALUES(?,?,?,?,?,?,?)", $_POST["user_transmit_time"], $_POST["user_receive_time"], $_POST["ntp_client_transmit_time"], $_POST["ntp_client_receive_time"], $_POST["ntp_server_transmit_time"], $_POST["ntp_server_receive_time"], $_SERVER["REMOTE_ADDR"]);

            if ($results === false)
            {
                echo "Log failed!";
            }

    }
?>
