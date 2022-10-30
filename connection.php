<?php
$conn = pg_connect("postgres://jezjickuhvcxio:d1cee8f27ce93b06b3be4560d5ec51eed9545886d0f9ad02f66e613834b84b70@ec2-23-20-140-229.compute-1.amazonaws.com:5432/d2ujo900qie0a5");

	if(!$conn)
	{
		die("Could not connect to database");
    }
    ?>