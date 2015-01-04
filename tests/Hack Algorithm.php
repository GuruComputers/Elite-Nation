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
$T_F = 11;
$L_W = 1;
$L_I = 10;
$T_I = 1;
$L_C = 10;
$T_C = 1;
$L_R = 10;
$T_R = 1;
$L_P = 5;
$T_P = 1;
$L_D = 11;
$T_E = 1;

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
$F_W_D = $L_W - $T_F;
$I_D = $L_I - $T_I;
$C_D = $L_C - $T_C;
$R_D = $L_R - $T_R;
$P_D = $L_P - $T_P;
$D_E_D = $L_D - $T_E;

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
$T_F_Sp = $T_F * $T_F_S * $F_W_D;
$L_W_Sp = $L_W * $L_W_S * $F_W_D;
$L_I_Sp = $L_I * $L_I_S * $I_D;
$T_I_Sp = $T_I * $T_I_S * $I_D;
$L_C_Sp = $L_C * $L_C_S * $C_D;
$T_C_Sp = $T_C * $T_C_S * $C_D;
$L_R_Sp = $L_R * $L_R_S * $R_D;
$T_R_Sp = $T_R * $T_R_S * $R_D;
$L_P_Sp = $L_P * $L_P_S * $P_D;
$T_P_Sp = $T_P * $T_P_S * $P_D;
$L_D_Sp = $L_D * $L_D_S * $D_E_D;
$T_E_Sp = $T_E * $T_E_S * $D_E_D;

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