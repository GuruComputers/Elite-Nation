<?php
//SET VARIABLES
	//DIFFERENCES
$F_W_D = 0;
$I_D = 0;
$C_D = 0;
$R_D = 0;
$P_D = 0;
$D_E_D = 0;

	//OTHERS
$Hackable = 1;
$Min_Time = 5;
$Base_Time = 145.5;
$Max_Time = 300;
$Hack_Speed = 0;

//CHANGE THIS SECTION WITH IMPORTED VALUES
$target_firewall = 11;
$local_waterdrill = 1;
$local_internet = 10;
$target_internet = 1;
$local_cpu = 10;
$target_cpu = 1;
$local_ram = 10;
$target_ram = 1;
$local_process = 5;
$target_process = 1;
$local_decryptor = 11;
$target_encryptor = 1;

//SCORE WEIGHTS
$T_F_S = 0.01838668661;
$L_W_S = 0.01838668661;
$L_I_S = 2.4583;
$T_I_S = 2.4583;
$L_C_S = 2.4583;
$T_C_S = 2.4583;
$L_R_S = 2.4583;
$T_R_S = 2.4583;
$L_P_S = 2.4583;
$T_P_S = 2.4583;
$L_D_S = 0.01838668661;
$T_E_S = 0.01838668661;

//SETTING DIFFERENCES
$F_W_D = $local_waterdrill - $target_firewall;
$I_D = $local_internet - $target_internet;
$C_D = $local_cpu - $target_cpu;
$R_D = $local_ram - $target_ram;
$P_D = $local_process - $target_process;
$D_E_D = $local_decryptor - $target_encryptor;

//CHECKING IF HACKABLE
if ($F_W_D > 10 or $F_W_D < -10) {
	$Hackable = 0;
}
if ($I_D > 10 or $I_D < -10) {
	$Hackable = 0;
}
if ($C_D > 10 or $C_D < -10) {
	$Hackable = 0;
}
if ($R_D > 10 or $R_D < -10) {
	$Hackable = 0;
}
if ($P_D > 10 or $P_D < -10) {
	$Hackable = 0;
}
if ($D_E_D > 10 or $P_D < -10) {
	$Hackable = 0;
}

//CALCULATING SPEED
$T_F_Sp = $target_firewall * $T_F_S * $F_W_D;
$L_W_Sp = $local_waterdrill * $L_W_S * $F_W_D;
$L_I_Sp = $local_internet * $L_I_S * $I_D;
$T_I_Sp = $target_internet * $T_I_S * $I_D;
$L_C_Sp = $local_cpu * $L_C_S * $C_D;
$T_C_Sp = $target_cpu * $T_C_S * $C_D;
$L_R_Sp = $local_ram * $L_R_S * $R_D;
$T_R_Sp = $target_ram * $T_R_S * $R_D;
$L_P_Sp = $local_process * $L_P_S * $P_D;
$T_P_Sp = $target_process * $T_P_S * $P_D;
$L_D_Sp = $local_decryptor * $L_D_S * $D_E_D;
$T_E_Sp = $target_encryptor * $T_E_S * $D_E_D;

$Hack_Speed = $Base_Time - $T_F_Sp - $L_W_Sp - $L_I_Sp - $T_I_Sp - $L_C_Sp - $T_C_Sp - $L_R_Sp - $T_R_Sp - $T_R_Sp - $L_P_SP - $T_P_Sp - $L_D_Sp - $T_E_Sp;

if ($Hack_Speed > $Max_Time) {
	$Hack_Speed = $Max_Time;
}
if ($Hack_Speed < $Min_Time) {
	$Hack_Speed = $Min_Time;
}

//RETURN VALUE
if ($Hackable == 0) {
	echo ("You can't hack this player");
} 
else{
	echo $Hack_Speed;
}
?>