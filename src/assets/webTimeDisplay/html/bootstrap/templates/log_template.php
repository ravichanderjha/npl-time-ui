        <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet"/>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('table').DataTable();
} );
</script>
<style>
.log_id
{
	width:5px;
}
.log_user_ip
{
	width:30px;
}
.log_time
{
	width:120px;
}
</style>
<body>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="log_id">ID</th>
                <th class="log_user_ip">USER IP</th>
                <th class="log_time">User Transmit Time</th>
                <th class="log_time">User Receive Time</th>
                <th class="log_time">NTP-Client Receive Time FROM USER</th>
                <th class="log_time">NTP-Client Transmit Time TO USER</th>
                <th class="log_time">NTP-SERVER Receive Time FROM NTP-CLIENT</th>
                <th class="log_time">NTP-SERVER Transmit Time TO NTP-CLIENT</th>
                <th class="log_time">User Round Trip Time</th>
                <th class="log_time">NTP-Client Round Trip Time</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="log_id">ID</th>
                <th class="log_user_ip">USER IP</th>
                <th class="log_time">User Transmit Time</th>
                <th class="log_time">User Receive Time</th>
                <th class="log_time">NTP-Client Receive Time FROM USER</th>
                <th class="log_time">NTP-Client Transmit Time TO USER</th>
                <th class="log_time">NTP-SERVER Receive Time FROM NTP-CLIENT</th>
                <th class="log_time">NTP-SERVER Transmit Time TO NTP-CLIENT</th>
                <th class="log_time">User Round Trip Time</th>
                <th class="log_time">NTP-Client Round Trip Time</th>
            </tr>
        </tfoot>
        <tbody>
	<?php
		$rows = query("SELECT * from TIMESTAMP");
		foreach ($rows as $row):
	?>
        <tr>
            <td class="log_id"><?= $row["ID"] ?></td>
            <td class="log_user_ip"><?= $row["USER_IP"] ?></td>
            <td style="width:120px;"><?= $row["USER_TRANSMIT"] ?></td>
            <td class="log_time"><?= $row["USER_RECEIVE"] ?></td>
            <td class="log_time"><?= $row["NTP_CLIENT_RECEIVE"] ?></td>
            <td class="log_time"><?= $row["NTP_CLIENT_TRANSMIT"] ?></td>
            <td class="log_time"><?= $row["NTP_SERVER_RECEIVE"] ?></td>
            <td class="log_time"><?= $row["NTP_SERVER_TRANSMIT"] ?></td>
            <td class="log_time"><?= round(($row["USER_RECEIVE"] - $row["USER_TRANSMIT"]), 6) ?></td>
            <td class="log_time"><?= round(($row["NTP_CLIENT_TRANSMIT"] - $row["NTP_CLIENT_RECEIVE"]), 6) ?></td>
        </tr>    
	<?php endforeach ?>
        </tbody>
        </thead>
</table>
</body>

