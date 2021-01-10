<!DOCTYPE html>
<html>
<head>
<title>Launch Page: Dungeon Crawl Classics Wizard Character Generator Version 3</title>
    
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Mark Tasaka 2020">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    
	<link rel="stylesheet" href="css/githubMCC.css"/> 
	<link rel="stylesheet" href="css/bf_additions.css"/> 
	<link rel="stylesheet" href="css/bf_additions2.css"/> 
	<link rel="stylesheet" href="css/general.css"/> 
	<link rel="stylesheet" href="css/basic_style.css"/> 
	<script type="text/javascript" src="js/wizardMenu.js"></script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="utf-8" />
	

	</head>
	
	
<body>
    

	
	<section>
		
		<h1><img src="images/title.png" alt="Dungeon Crawl Classics Wizard Character Generator Version 3" class="image" /></h1>
		
				
			
		
                                
                
            <br/>
            <br/>
        
        <p>The Dungeon Crawl Classics Wizard Character Generator Version 3 is designed primarily with PHP and jQuery/JavaScript. The Launch Page has a series of drop-down menus, input fields and checkboxes, where alignments, weapons, armour, gear, character level, etc., are added to the character sheet. When the submit button is entered, the information (variables) is collected through POST methods and added to the character sheet. Several of the variables POSTED modify the values on the character sheet; therefore, jQuery or PHP functions have been created to make these adjustments possible.</p>    

        <p>Several of the jQuery/JavaScript functions are stored in external files, as a means of creating greater design efficiency, with the goal of designing a program with high cohesion and low coupling. In this way, this program replicates Object-Oriented design. JSON is used to store multi-column variables, with jQuery functions used to retrieve these variables.</p>

        <p>Live versions of the Character Generator are found at:</p>

        <p><a href="https://www.oldschooladventures.org/dcc/wizard/"  class="text_link" target="_blank"><span class="bold">Dwarves, Warriors & Mighty Deeds: A DCC Fan Site</span></a></p>

        <p><a href="https://www.tasaka-games.com/dcc/more/classes/wizard/"  class="text_link" target="_blank"><span class="bold">Fantastic Adventures and the Distgruntled Gong Farmer: A DCC Adventure Module</span></a></p>

        <br/>
        <br/>
            
  
  
            
        <form action="" id ="WizardFormV3"  target="_blank" method="post">
    
    <div class="content9">


                
  
    <div id="characterNameV3">
            <span class="formIputDescription">Character's Name:</span>
            <span id="characterWizardNameV3"> <input type="text" name="theCharacterName" value="" class="nameBox"></span>
           
           <br/>
           <br/>
    </div>

           <div class="formIputDescription">
           <span class="footnote3"><input type="checkbox" id="checkBoxRandomNameV3" value="1" name="theCheckBoxRandomName" onClick="hideCharacterName()">Use Randomly Generated Name</span>
           </div>

           <br/>

          <div id="PlayerNameV3">
          <span class="formIputDescription">Player's Name:</span>
          <span id="PlayerNameV3"> <input type="text" name="thePlayerName" value="" class="nameBox"></span>

          </div>

          <br/>
                  
                           
        <span class="formIputDescription">Gender:</span>	
			  <select id="genderV3" name="theGender" class="alignmentBox">	
				<option value="Male" selected>Male</option>
				<option value="Female">Female</option>
				<option value="Other">Other</option>
				<option value="Blank">Blank</option>
        </select>
        
        <br/>
        <br/>
            
                            
            <span class="formIputDescription">Character Level:</span>	
			  <select id="levelV3" name="theLevel" class="alignmentBox">	
				<option value="1" selected>Level 1</option>
				<option value="2">Level 2</option>
				<option value="3">Level 3</option>
				<option value="4">Level 4</option>
				<option value="5">Level 5</option>
				<option value="6">Level 6</option>
				<option value="7">Level 7</option>
				<option value="8">Level 8</option>
				<option value="9">Level 9</option>
				<option value="10">Level 10</option>
			  </select>
            
            <br/>
            <br/>
                
                    

                
            
            <span class="formIputDescription">Alignment:</span>	
			  <select id="alignmentV3" name="theAlignment" class="alignmentBox">			
                <option value="Lawful" selected>Lawful</option>
				<option value="Neutral">Neutral</option>
				<option value="Chaotic">Chaotic</option>
			  </select>
            
            <br/>
            <br/>
                            
                <span class="formIputDescription">Ability Scores:</span>	
			  <select id="abilityScoresV3" name="theAbilityScore" class="alignmentBox">	
				<option value="1" selected>3d6 (Old School)</option>
				<option value="2">4d6, drop the lowest</option>
				<option value="3">2d6+6</option>
				<option value="4">2d8+2</option>
				<option value="5">2d7+4</option>
			  </select>
            
                
            <br/>
            <br/>
            
                
  

           <div class="formIputDescription">
           <span class="footnote3"><input type="checkbox" id="patronV3" value="1" name="thePatron">Add Supernatural Patron</span>
           </div>

           <br/>
                

           <div class="formIputDescription">
           <span class="footnote3"><input type="checkbox" id="familiarV3" value="1" name="theFamiliar">Add Familiar</span>
           </div>

           <br/>
                

       


               <div class="formIputDescription2">
                  <span class="weaponBoxHeader"><input type="checkbox" id="checkBoxRandomWeaponsV3" value="1" name="thecheckBoxRandomWeaponsV3" onClick="hideWeapons()">&nbsp&nbspRandomly Generate Weapons</span>
                  </div>
       
                  <br/>


          <div id="weaponsSelectionV3">

                <span class="weaponBoxHeader">Weapons:</span>
                <br/><br/>
                
            <div id="weaponsGroupingsV3">
                <input type="checkbox" name="theWeapons[]" value="0"> Dagger<br/>
                <input type="checkbox" name="theWeapons[]" value="1"> Longbow<br/>  
                <input type="checkbox" name="theWeapons[]" value="2"> Longsword<br/>  
                <input type="checkbox" name="theWeapons[]" value="3"> Shortbow<br/>  
                <input type="checkbox" name="theWeapons[]" value="4"> Short sword<br/> 
                <input type="checkbox" name="theWeapons[]" value="5"> Staff<br/>   
                
                
                </div>
                <br/>
                <br/>
              </div>
                

                
            

            <div class="formIputDescription2">
                  <span class="weaponBoxHeader"><input type="checkbox" id="checkBoxRandomGearV3" value="1" name="theCheckBoxRandomGear" onClick="hideGear()">&nbsp&nbspRandomly Generated Gear</span>
                  </div>
                  <br/>
       


                <div id="gearSelectionV3">
                <span class="weaponBoxHeader">Equipment/Ammo:</span>
                <br/><br/>
                
            <div id="gearGroupingsV3">
                <span class="weaponSubHead">Equipment:</span><br/><br/>
                <input type="checkbox" name="theGear[]" value="0"> Backpack<br/>
                <input type="checkbox" name="theGear[]" value="1"> Candle<br/>  
                <input type="checkbox" name="theGear[]" value="2"> Chain, 10'<br/>  
                <input type="checkbox" name="theGear[]" value="3"> Chalk, 12 pieces<br/>  
                <input type="checkbox" name="theGear[]" value="4"> Chest, empty<br/>  
                <input type="checkbox" name="theGear[]" value="5"> Crowbar<br/>   
                <input type="checkbox" name="theGear[]" value="6"> Flask, empty<br/>  
                <input type="checkbox" name="theGear[]" value="7"> Flint & steel<br/>  
                <input type="checkbox" name="theGear[]" value="8"> Grappling hook<br/> 
                <input type="checkbox" name="theGear[]" value="9"> Hammer, small<br/> 
                <input type="checkbox" name="theGear[]" value="10"> Holy symbol<br/> 
                <input type="checkbox" name="theGear[]" value="11"> Holy water, 1 vial<br/> 
                <input type="checkbox" name="theGear[]" value="12"> Iron spikes, dozen<br/> 
                <input type="checkbox" name="theGear[]" value="13"> Lantern<br/> 
                <input type="checkbox" name="theGear[]" value="14"> Mirror, hand-sized<br/> 
                <input type="checkbox" name="theGear[]" value="15"> Oil, 1 flask<br/>
                <input type="checkbox" name="theGear[]" value="16"> Pole, 10-foot<br/> 
                <input type="checkbox" name="theGear[]" value="17"> Rations, 5 days<br/> 
                <input type="checkbox" name="theGear[]" value="18"> Rope, 50'<br/> 
                <input type="checkbox" name="theGear[]" value="19"> Sack, large<br/> 
                <input type="checkbox" name="theGear[]" value="20"> Sack, small<br/> 
                <input type="checkbox" name="theGear[]" value="21"> Thieves' tools<br/> 
                <input type="checkbox" name="theGear[]" value="22"> Torches, 12<br/> 
                <input type="checkbox" name="theGear[]" value="23"> Waterskin<br/> 
                <br/>
                <span class="weaponSubHead">Ammo:</span><br/><br/>
                <input type="checkbox" name="theGear[]" value="24"> Arrows, 20<br/>  
                <input type="checkbox" name="theGear[]" value="25"> Silver arrows, 5<br/>   
                </div>
                
              </div>
            
		<div class="content8">
            

            
			  
    <br/>
            <br/>
    
            
			  
            			  
			<div class="generatorButtonA2">
			
			     <span class="generatorbuttonsC1">

				
                    <input type="submit" value="" id="generate_charactersWarriorV3"/>
			     
                </span>
				
			     <span class="generatorbuttonsC1">
				
                     <input type="reset"  value="" id="reset_generator3"/>
		
				</span>
                
		
            </div>
            </div>
            
				
            </div>
            
            </form>
            
                	

            <br/>
            <br/>
            <br/>
            <br/>
            

            
            
                
                
                	
                <script>
        

        $("#generate_charactersWarriorV3").click(function(){
         
    
         $("#WizardFormV3").attr('action', "character3/dccWizard.php");

     });


                    
                </script>
        
                
                
      
                
 
                
    </section>


</body>
</html>