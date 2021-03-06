<?
	include_once "Device_AbstractPowerSwitch.ips.php";
	
	function HomeMaticSwitch_TogglePower($Parameters) {
		$i = 1;
		$deviceID = $Parameters[$i]; $i++;
		$command = (isset($Parameters[$i]) ? $Parameters[$i] : null); $i++;
		$parameter = (isset($Parameters[$i]) ? $Parameters[$i] : null);
		if(!PowerSwitch_checkCommand($command, $parameter)) {
			return;
		}
		
		$powerOn = null;
		if($command != null && $command == "PWR") {
			$powerOn = ($parameter == "ON" ? true : false);
		}
		IPSLogger_Trc(__file__, "Switching ".$deviceID.": ".$powerOn);
		
		include_once "Device_HomeMaticSwitch.ips.php";
		HomeMaticSwitch_setPower($deviceID, $powerOn);
	}
?>