<!DOCTYPE html>
<html>
<head>
<title>Dungeon Crawl Classics Wizard Character Generator</title>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
	<meta charset="UTF-8">
	<meta name="description" content="Dungeon Crawl Classics Wizard Character Generator. Goblinoid Games.">
	<meta name="keywords" content="Dungeon Crawl Classics, Goblinoid Games,HTML5,CSS,JavaScript">
	<meta name="author" content="Mark Tasaka 2020">
    
    <link rel="icon" href="../../../../images/favicon/icon.png" type="image/png" sizes="16x16"> 
		

	<link rel="stylesheet" type="text/css" href="css/wizard.css">
    
    
    <script type="text/javascript" src="./js/dieRoll.js"></script>
    <script type="text/javascript" src="./js/modifiers.js"></script>
    <script type="text/javascript" src="./js/hitPoinst.js"></script>
    <script type="text/javascript" src="./js/abilityScoreAddition.js"></script>
    <script type="text/javascript" src="./js/classAbilities.js"></script>
    <script type="text/javascript" src="./js/occupation.js"></script>
    <script type="text/javascript" src="./js/luckySign.js"></script>
    <script type="text/javascript" src="./js/adjustments.js"></script>
    <script type="text/javascript" src="./js/languages.js"></script>
    
    
    
</head>
<body>
    
    <!--PHP-->
    <?php
    
    include 'php/checks.php';
    include 'php/weapons.php';
    include 'php/gear.php';
    include 'php/classDetails.php';
    include 'php/clothing.php';
    include 'php/abilityScoreGen.php';
    include 'php/randomName.php';
    include 'php/xp.php';
    

        if(isset($_POST["theCharacterName"]))
        {
            $characterName = $_POST["theCharacterName"];
    
        }

        if(isset($_POST["thePlayerName"]))
        {
            $playerName = $_POST["thePlayerName"];
    
        }
        
        if(isset($_POST["theGender"]))
        {
            $gender = $_POST["theGender"];
        }


        if(isset($_POST['theCheckBoxRandomName']) && $_POST['theCheckBoxRandomName'] == 1) 
        {
            $characterName = getRandomName($gender) . " " . getSurname();
        } 

        if(isset($_POST["theAlignment"]))
        {
            $alignment = $_POST["theAlignment"];
        }
    
        if(isset($_POST["theLevel"]))
        {
            $level = $_POST["theLevel"];
        
        } 
        

        $xpNextLevel = getXPNextLevel ($level);
        
        if(isset($_POST["theAbilityScore"]))
        {
            $abilityScoreGen = $_POST["theAbilityScore"];
        
        } 
        
        if(isset($_POST["thePatron"]))
        {
            $patron = $_POST["thePatron"];

            if($patron == "")
            {
                $patron = " ";
            }
    
        }
        
        if(isset($_POST["theFamilar"]))
        {
            $familar = $_POST["theFamilar"];

            if($familar == "")
            {
                $familar = " ";
            }
    
        }
    
    $dieType = generationMethod ($abilityScoreGen)[0];
    $numberDie = generationMethod ($abilityScoreGen)[1];
    $dieRemoved = generationMethod ($abilityScoreGen)[2];
    $valueAdded = generationMethod ($abilityScoreGen)[3];
    
    $generationMessage = generationMesssage ($abilityScoreGen);


       $speed = 30;

       $reflexBase = savingThrowReflex($level);
       $fortBase = savingThrowFort($level);
       $willBase = savingThrowWill($level);

       $criticalDie = criticalDie($level);

       $attackBonus = attackBonus($level);

       $actionDice = actionDice($level);

       $title = title($level, $alignment);

       $knownSpells = knownSpells($level);

       $maxSpellLevel = maxSpellLevel($level);


        $weaponArray = array();
        $weaponNames = array();
        $weaponDamage = array();

        //For Random Select weapon
        if(isset($_POST['thecheckBoxRandomWeaponsV3']) && $_POST['thecheckBoxRandomWeaponsV3'] == 1) 
        {
            $weaponArray = getRandomWeapons();
        
       }
        else
       {
        if(isset($_POST["theWeapons"]))
       {
            foreach($_POST["theWeapons"] as $weapon)
            {
                array_push($weaponArray, $weapon);
           }
        }

    }
        

    foreach($weaponArray as $select)
    {
        array_push($weaponNames, getWeapon($select)[0]);
    }
        
    foreach($weaponArray as $select)
    {
        array_push($weaponDamage, getWeapon($select)[1]);
    }
        
        $gearArray = array();
        $gearNames = array();

        /*
        $a00 = array("Dagger", "1d4/1d10");
        $a01 = array("Longbow", "1d6");
        $a02 = array("Longsword", "1d8");
        $a03 = array("Shortbow", "1d6");
        $a04 = array("Short sword", "1d6");
        $a05 = array("Staff", "1d4");*/
    
            //For Random Select gear

    //For Random Select gear
    if(isset($_POST['theCheckBoxRandomGear']) && $_POST['theCheckBoxRandomGear'] == 1) 
    {
        $gearArray = getRandomGear();

        $weaponCount = count($weaponArray);

        $hasLongbow = false;
        $hasShortbow = false;

        for($i = 0; $i < $weaponCount; ++$i)
        {
            if($weaponArray[$i] == "1" && $hasShortbow == false)
            {
                array_push($gearArray, 24);
                array_push($gearArray, 25);
                
                $hasLongbow = true;
            }

            if($weaponArray[$i] == "3" && $hasLongbow == false)
            {
                array_push($gearArray, 24);

                $hasShortbow = true;
            }

        }

    }
    else
    {
        //For Manually select gear
        if(isset($_POST["theGear"]))
            {
                foreach($_POST["theGear"] as $gear)
                {
                    array_push($gearArray, $gear);
                }
            }

    }

    
        foreach($gearArray as $select)
        {
            array_push($gearNames, getGear($select)[0]);
        }
    
    
    ?>

    
	
<!-- JQuery -->
  <img id="character_sheet"/>
   <section>
       
		<span id="profession"></span>
           
		<span id="strength"></span>
		<span id="agility"></span> 
		<span id="stamina"></span> 
		<span id="intelligence"></span>
		<span id="personality"></span>
       <span id="luck"></span>
       
       
           
		<span id="strengthMod"></span>
		<span id="agilityMod"></span> 
		<span id="staminaMod"></span> 
		<span id="intelligenceMod"></span>
		<span id="personalityMod"></span>
       <span id="luckMod"></span>

       <span id="reflex"></span>
       <span id="fort"></span>
       <span id="will"></span>
		  
       
       <span id="gender">
           <?php
           echo $gender;
           ?>
       </span>
       
       
       <span id="dieRollMethod"></span>

       
       <span id="class">Wizard</span>
       
       <span id="armourClass"></span>

       <span id="baseAC"></span>
       
       <span id="hitPoints"></span>

       <span id="languages"></span>
       
       <span id="trainedWeapon"></span>
       <span id="tradeGoods"></span>

       
       <span id="level">
           <?php
                echo $level;
           ?>
        </span>
        
       <span id="xpNextLevel">
           <?php
                echo $xpNextLevel;
           ?>
        </span>

       

       
       <span id="characterName">
           <?php
                echo $characterName;
           ?>
        </span>

        
        
       <span id="playerName">
           <?php
                echo $playerName;
           ?>
        </span>
       
       
              
         <span id="alignment">
           <?php
                echo $alignment;
           ?>
        </span>
        
        <span id="speed"></span>


        <span id="criticalDieTable">
            <?php
                echo $criticalDie;
            ?>
        </span>
        
        <span id="attackBonus">
        </span>

        <span id="initiative">
        </span>
        
        <span id="actionDice">
            <?php
                echo $actionDice;
            ?>
        </span>

        <span id="spellCheck">
        </span>
        
        <span id="title">
            <?php
                echo $title;
            ?>
        </span>
        
        
        <span id="knownSpells">
            <?php
                echo $knownSpells;
            ?>
        </span>

        
        <span id="maxSpellLevel">
            <?php
                echo $maxSpellLevel;
            ?>
        </span>
        
        <span id="patron">
            <?php
                echo $patron;
            ?>
        </span>
        
        
        <span id="familar">
            <?php
                echo $familar;
            ?>
        </span>

        
		<p id="birthAugur"><span id="luckySign"></span>: <span id="luckyRoll"></span> (<span id="LuckySignBonus"></span>)</p>

        <span id="melee"></span>
        <span id="range"></span>
        
        <span id="meleeDamage"></span>
        <span id="rangeDamage"></span>

       
       
       <span id="weaponsList">
           <?php
           
           foreach($weaponNames as $theWeapon)
           {
               echo $theWeapon;
               echo "<br/>";
           }
           
           ?>  
        </span>

       <span id="weaponsList2">
           <?php
           foreach($weaponDamage as $theWeaponDam)
           {
               echo $theWeaponDam;
               echo "<br/>";
           }
           ?>        
        </span>
       

       <span id="gearList">
           <?php

           $gearCount = count($gearNames);
           $counter = 1;
           
           foreach($gearNames as $theGear)
           {
              echo $theGear;

              if($counter == $gearCount-1)
              {
                  echo " & ";
              }
              elseif($counter > $gearCount-1)
              {
                  echo ".";
              }
              else
              {
                  echo ", ";
              }

              ++$counter;
           }
           ?>
       </span>


       <span id="abilityScoreGeneration">
            <?php
           echo $generationMessage;
           ?>
       </span>
       

       
	</section>
	

		
  <script>
      

	  
	/*
	 Character() - wizard Character Constructor
	*/
	function Character() {
        
        let strength = rollDice(<?php echo $dieType ?> ,<?php echo $numberDie ?>, <?php echo $dieRemoved ?>, <?php echo $valueAdded ?>);
        let	intelligence = rollDice(<?php echo $dieType ?> ,<?php echo $numberDie ?>, <?php echo $dieRemoved ?>, <?php echo $valueAdded ?>);
        let	personality = rollDice(<?php echo $dieType ?> ,<?php echo $numberDie ?>, <?php echo $dieRemoved ?>, <?php echo $valueAdded ?>);
        let agility = rollDice(<?php echo $dieType ?> ,<?php echo $numberDie ?>, <?php echo $dieRemoved ?>, <?php echo $valueAdded ?>);
        let stamina = rollDice(<?php echo $dieType ?> ,<?php echo $numberDie ?>, <?php echo $dieRemoved ?>, <?php echo $valueAdded ?>);
        let	luck = rollDice(<?php echo $dieType ?> ,<?php echo $numberDie ?>, <?php echo $dieRemoved ?>, <?php echo $valueAdded ?>);
        
        let strengthMod = abilityScoreModifier(strength);
        let intelligenceMod = abilityScoreModifier(intelligence);
        let personalityMod = abilityScoreModifier(personality);
        let agilityMod = abilityScoreModifier(agility);
        let staminaMod = abilityScoreModifier(stamina);
        let luckMod = abilityScoreModifier(luck);
        let level = '<?php echo $level ?>';
        let gender = '<?php echo $gender ?>';
	    let	profession = getOccupation();
	    let birthAugur = getLuckySign();
        let bonusLanguages = getBonusLanguages(intelligenceMod, birthAugur, luckMod);
        let attackBonus = <?php echo $attackBonus ?>;
	    let baseAC = getBaseArmourClass(agilityMod) + adjustAC(birthAugur, luckMod);

		let wizardCharacter = {
			"strength": strength,
			"agility": agility,
			"stamina": stamina,
			"intelligence": intelligence,
			"personality": personality,
			"luck": luck,
            "strengthModifer": addModifierSign(strengthMod),
            "intelligenceModifer": addModifierSign(intelligenceMod),
            "personalityModifer": addModifierSign(personalityMod),
            "agilityModifer": addModifierSign(agilityMod),
            "staminaModifer": addModifierSign(staminaMod),
            "luckModifer": addModifierSign(luckMod),
			"profession":  profession.occupation,
            "acBase": baseAC,
			"luckySign": birthAugur.luckySign,
            "luckyRoll": birthAugur.luckyRoll,
            "move": <?php echo $speed ?> + addLuckToSpeed (birthAugur, luckMod),
            "trainedWeapon": profession.trainedWeapon,
            "tradeGoods": profession.tradeGoods,
            "addLanguages": "Common" + bonusLanguages,
            "armourClass":  baseAC,
            "hp": getHitPoints (level, staminaMod) + hitPointAdjustPerLevel(birthAugur,  luckMod),
            "attackBonus": attackBonus,
            "spellCheck": <?php echo $level ?> + intelligenceMod,
			"melee": attackBonus +strengthMod + meleeAdjust(birthAugur, luckMod),
			"range": attackBonus + agilityMod + rangeAdjust(birthAugur, luckMod),
			"meleeDamage": strengthMod + meleeDamageAdjust(birthAugur, luckMod),
			"rangeDamage": rangeDamageAdjust(birthAugur, luckMod),
            "reflex": <?php echo $reflexBase ?> + agilityMod + adjustRef(birthAugur, luckMod),
            "fort": <?php echo $fortBase ?> + staminaMod + adjustFort(birthAugur,luckMod),
            "will": <?php echo $willBase ?> + personalityMod + adjustWill(birthAugur, luckMod),
            "initiative": agilityMod + adjustInit(birthAugur, luckMod)

		};
	    if(wizardCharacter.hitPoints <= 0 ){
			wizardCharacter.hitPoints = 1;
		}
		return wizardCharacter;
	  
	  }
	  


  
       let imgData = "images/wizard.png";
      
        $("#character_sheet").attr("src", imgData);
      

      let data = Character();
      
      $("#profession").html(data.profession);
		 
      $("#strength").html(data.strength);
      
      $("#intelligence").html(data.intelligence);
      
      $("#personality").html(data.personality);
      
      $("#agility").html(data.agility);
      
      $("#stamina").html(data.stamina);
      
      $("#luck").html(data.luck);
      
      
		 
      $("#strengthMod").html(data.strengthModifer);
      
      $("#intelligenceMod").html(data.intelligenceModifer);
      
      $("#personalityMod").html(data.personalityModifer);
      
      $("#agilityMod").html(data.agilityModifer);
      
      $("#staminaMod").html(data.staminaModifer);
      
      $("#luckMod").html(data.luckModifer);
      
      
      
      $("#dieRollMethod").html(data.dieRollMethod);
            
      $("#hitPoints").html(data.hp);
      
      $("#armourClass").html(data.armourClass);
      
      $("#reflex").html(addModifierSign(data.reflex));
      $("#fort").html(addModifierSign(data.fort));
      $("#will").html(addModifierSign(data.will));
      
      $("#initiative").html(addModifierSign(data.initiative));
      
      $("#speed").html(data.move + "'");
      
      $("#luckySign").html(data.luckySign);
      $("#luckyRoll").html(data.luckyRoll);    
      $("#LuckySignBonus").html(data.luckModifer);

      $("#languages").html(data.addLanguages);
      $("#attackBonus").html(addModifierSign(data.attackBonus));
      $("#spellCheck").html(addModifierSign(data.spellCheck));

      $("#melee").html(addModifierSign(data.melee));
      $("#range").html(addModifierSign(data.range));
      $("#meleeDamage").html(addModifierSign(data.meleeDamage));
      $("#rangeDamage").html(addModifierSign(data.rangeDamage));

      
      $("#baseAC").html("(" + data.acBase + ")");
      $("#trainedWeapon").html("Trained Weapon: " + data.trainedWeapon);
      $("#tradeGoods").html("Trade Goods: " + data.tradeGoods);
      

	 
  </script>
		
	
    
</body>
</html>