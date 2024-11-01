<?php
  /*
  Plugin Name: Tell Sammy
  Plugin URI: http://www.tellsammy.com/
  Description: Most Hated & Most Loved? Tell Sammy, Your Buddy At Heart! Create most loved & most hated Top 10s, share your lists with people, contribute to the www.tellsammy.com world totals by voting from your blog.
  Author: Sammy
  Version: 1.0.1
  Author URI: http://www.tellsammy.com/
  */
    
   add_action('template_redirect','addHeaderCode');
   
   function addHeaderCode(){
       if ( function_exists('wp_enqueue_script') ) {
            
            wp_enqueue_script('jsr',  'http://www.tellsammy.com/js/jsr.js', array('prototype'), false);
            wp_enqueue_script('tswp', 'http://www.tellsammy.com/js/tswp.js', false);
       
       }
   }
    
   add_action('plugins_loaded', 'widgetInit');
   
   function widgetInit() {
      if ( !function_exists('register_sidebar_widget') ) return;
      register_sidebar_widget('Tell Sammy', 'showHatedLovedWg');
      register_widget_control('Tell Sammy', 'createWidgetMenu');
                
   }//END widgetInit()
   
   function optimizedStrToLower($s){
       
        $ln = strlen($s);
        $ln1 = $ln -1;
        for($i=0; $i < $ln; $i++){
            $k = ord(substr($s, $i, 1));
            if($k>=65 && $k <= 90){
                if($i > 0){
                    $l1 = substr($s, 0, $i);
                }else{
                    $l1 ='';
                }
                $l1 = $l1 . chr($k+32);
                if($i < $ln1){
                    $l1 = $l1 . substr($s, $i  + 1);
                }
                $s = $l1;

            }
        }
        return $s;
        
  } 
 
   function trimAndUpperCase($str){
       
       $str = trim($str);
       $str = strtoupper( substr($str,0,1) ) . optimizedStrToLower( substr($str,1) );

       while(stripos($str, ' ') > 0) {
            $str = substr($str,0,stripos($str, ' ')) . "\"" . strtoupper(substr($str, stripos($str, ' ')+1,1)) . substr($str, stripos($str, ' ')+2);
       }

       $str = str_replace('"',' ', $str);

       $str = trim(ereg_replace( ' +', ' ', $str));
       
       return $str;
   }
   
   function createWidgetMenu() {
       
      $blogUrl = '"'.get_bloginfo('wpurl').'"';
      if ( isset($_POST['tsHated1']) ) {
          
         update_option('tsHated1', trimAndUpperCase($_POST['tsHated1']));
         update_option('tsHated2', trimAndUpperCase($_POST['tsHated2']));
         update_option('tsHated3', trimAndUpperCase($_POST['tsHated3']));
         update_option('tsHated4', trimAndUpperCase($_POST['tsHated4']));
         update_option('tsHated5', trimAndUpperCase($_POST['tsHated5']));
         update_option('tsHated6', trimAndUpperCase($_POST['tsHated6']));
         update_option('tsHated7', trimAndUpperCase($_POST['tsHated7']));
         update_option('tsHated8', trimAndUpperCase($_POST['tsHated8']));
         update_option('tsHated9', trimAndUpperCase($_POST['tsHated9']));
         update_option('tsHated10', trimAndUpperCase($_POST['tsHated10']));
         
         update_option('tsLoved1', trimAndUpperCase($_POST['tsLoved1']));
         update_option('tsLoved2', trimAndUpperCase($_POST['tsLoved2']));
         update_option('tsLoved3', trimAndUpperCase($_POST['tsLoved3']));
         update_option('tsLoved4', trimAndUpperCase($_POST['tsLoved4']));
         update_option('tsLoved5', trimAndUpperCase($_POST['tsLoved5']));
         update_option('tsLoved6', trimAndUpperCase($_POST['tsLoved6']));
         update_option('tsLoved7', trimAndUpperCase($_POST['tsLoved7']));
         update_option('tsLoved8', trimAndUpperCase($_POST['tsLoved8']));
         update_option('tsLoved9', trimAndUpperCase($_POST['tsLoved9']));
         update_option('tsLoved10', trimAndUpperCase($_POST['tsLoved10']));
         
         update_option('tsAccessKey', $_POST['saveAK']);
      }
     
?>
    <table><b><h3>Most Hated</h3></b>
        <tr><td>1. </td><td><input maxlength="23" style="width: 185px;" id="tsHated1" name="tsHated1" type="text" value="<?php echo get_option('tsHated1'); ?>" /></td></tr>
        <tr><td>2. </td><td><input maxlength="23" style="width: 185px;" id="tsHated2" name="tsHated2" type="text" value="<?php echo get_option('tsHated2'); ?>" /></td></tr>
        <tr><td>3. </td><td><input maxlength="23" style="width: 185px;" id="tsHated3" name="tsHated3" type="text" value="<?php echo get_option('tsHated3'); ?>" /></td></tr>
        <tr><td>4. </td><td><input maxlength="23" style="width: 185px;" id="tsHated4" name="tsHated4" type="text" value="<?php echo get_option('tsHated4'); ?>" /></td></tr>
        <tr><td>5. </td><td><input maxlength="23" style="width: 185px;" id="tsHated5" name="tsHated5" type="text" value="<?php echo get_option('tsHated5'); ?>" /></td></tr>
        <tr><td>6. </td><td><input maxlength="23" style="width: 185px;" id="tsHated6" name="tsHated6" type="text" value="<?php echo get_option('tsHated6'); ?>" /></td></tr>
        <tr><td>7. </td><td><input maxlength="23" style="width: 185px;" id="tsHated7" name="tsHated7" type="text" value="<?php echo get_option('tsHated7'); ?>" /></td></tr>
        <tr><td>8. </td><td><input maxlength="23" style="width: 185px;" id="tsHated8" name="tsHated8" type="text" value="<?php echo get_option('tsHated8'); ?>" /></td></tr>
        <tr><td>9. </td><td><input maxlength="23" style="width: 185px;" id="tsHated9" name="tsHated9" type="text" value="<?php echo get_option('tsHated9'); ?>" /></td></tr>
        <tr><td>10. </td><td><input maxlength="23" style="width: 185px;" id="tsHated10" name="tsHated10" type="text" value="<?php echo get_option('tsHated10'); ?>" /></td></tr>
    </table>
    <br />
    <table><b><h3>Most Loved</h3></b>
        <tr><td>1. </td><td><input maxlength="23" style="width: 185px;" id="tsLoved1" name="tsLoved1" type="text" value="<?php echo get_option('tsLoved1'); ?>" /></td></tr>
        <tr><td>2. </td><td><input maxlength="23" style="width: 185px;" id="tsLoved2" name="tsLoved2" type="text" value="<?php echo get_option('tsLoved2'); ?>" /></td></tr>
        <tr><td>3. </td><td><input maxlength="23" style="width: 185px;" id="tsLoved3" name="tsLoved3" type="text" value="<?php echo get_option('tsLoved3'); ?>" /></td></tr>
        <tr><td>4. </td><td><input maxlength="23" style="width: 185px;" id="tsLoved4" name="tsLoved4" type="text" value="<?php echo get_option('tsLoved4'); ?>" /></td></tr>
        <tr><td>5. </td><td><input maxlength="23" style="width: 185px;" id="tsLoved5" name="tsLoved5" type="text" value="<?php echo get_option('tsLoved5'); ?>" /></td></tr>
        <tr><td>6. </td><td><input maxlength="23" style="width: 185px;" id="tsLoved6" name="tsLoved6" type="text" value="<?php echo get_option('tsLoved6'); ?>" /></td></tr>
        <tr><td>7. </td><td><input maxlength="23" style="width: 185px;" id="tsLoved7" name="tsLoved7" type="text" value="<?php echo get_option('tsLoved7'); ?>" /></td></tr>
        <tr><td>8. </td><td><input maxlength="23" style="width: 185px;" id="tsLoved8" name="tsLoved8" type="text" value="<?php echo get_option('tsLoved8'); ?>" /></td></tr>
        <tr><td>9. </td><td><input maxlength="23" style="width: 185px;" id="tsLoved9" name="tsLoved9" type="text" value="<?php echo get_option('tsLoved9'); ?>" /></td></tr>
        <tr><td>10. </td><td><input maxlength="23" style="width: 185px;" id="tsLoved10" name="tsLoved10" type="text" value="<?php echo get_option('tsLoved10'); ?>" /></td></tr>
    </table>
    
    <script type="text/javascript">
        
            blogUrl      = <?php echo $blogUrl; ?>;
            tsName       = '<?php echo get_option('tsName'); ?>';
            tsSurname    = '<?php echo get_option('tsSurname'); ?>';
            tsSex        = '<?php echo $sex; ?>';
            tsBirthdate  = "";
            tsBirthdate += '<?php echo get_option('tsYear'); ?>';
            tsBirthdate += '-';
            tsBirthdate += '<?php echo get_option('tsMonth'); ?>';
            tsBirthdate += '-';
            tsBirthdate += '<?php echo get_option('tsDay'); ?>';
            tsReligion   = "";
            tsPlace      = '<?php echo get_option('tsPlace'); ?>';
            
            toGetAccessKeyWg(blogUrl, tsName, tsSurname, tsSex, tsBirthdate, tsReligion, tsPlace);
    
    </script>
    
    <input type="hidden" id="saveAK" name="saveAK" />
<?php
    }//END createWidgetMenu()

    function showHatedLovedWg() {
        
        $blogUrl = '"'.get_bloginfo('wpurl').'"';
        
        for ( $i=1; $i<11; $i++ ) {//hated list is loaded into a string

            $optName   = "tsHated".$i;
            $hatedStr .= get_option($optName);
            $ctrlStr   = "tsHated".($i+1);//for next element control
             
            if ( get_option($ctrlStr)!= false ) $hatedStr .= ','; //if there is next element
                                                            
        }
       
        for ( $i=1; $i<11; $i++) {//loved list is loaded into a string

            $optName   = "tsLoved".$i;
            $lovedStr .= get_option($optName);
            $ctrlStr   = "tsLoved".($i+1);//for next element control
             
            if ( get_option($ctrlStr) != false ) $lovedStr .= ','; //if there is next element
                                                           
        }        
?>
        <li>
        <br />
        <a target="_blank" href="http://www.tellsammy.com" 
        title="World's Most Hated & Most Loved Top 10s!">
            <h2>Tell Sammy</h2></a>
        <br />
        <p title="aaa"><strong>Most Loved</strong></p>
        <div id="myLovediv"></div>
        <br />
        <p><strong>Most Hated</strong></p>
        <div id="myHatediv"></div>
        <br />
        </li>  
      
    <script type="text/javascript">

        ak      = '<?php echo get_option('tsAccessKey'); ?>';
        blogUrl = <?php echo $blogUrl; ?>;
        love    = '<?php echo $lovedStr; ?>';
        hate    = '<?php echo $hatedStr; ?>';
        
        var waitHateStr = "";
        var waitLoveStr = "";
        var voteKey; //global variable for vote key
        
        toGetVoteKey(ak);       

        //--------------Taking User's Votes From Server------------------------ 

        function getMyHatedLoved(jsonData) {
            //taking user's hated & loved list in strings   
            var nullItemCount=0;
            var myLoveStr = "";
            var myHateStr = "";
            
            for ( i=0; i<10; i++ ) {
              //null item control
              if ( jsonData[0].items[i].item!="null" ) {
                  //Show Rankings in Blog had checked 
                  <?php if ( get_option('tsNumber') == 'checked' ) { ?>
                    myLoveStr += (i+1) + '. ';                  
                    if ( i!=9 ) myLoveStr += '&nbsp;&nbsp;';
                  <?php }?>

				myLoveStr += '<a id="lMy'+i+'" href="javascript:voteForMyList(\'lMy'+i+'\')" ';
				//Show votes in Blog isn't checked
				<?php if ( get_option('tsVote') != 'checked' ) { ?>
					myLoveStr += 'title="' + jsonData[0].items[i].vote + ' Votes! Most Hated &amp; Most Loved? (www.tellsammy.com)">'; 
				<?php } else { ?>
					myLoveStr += 'title="Click To Vote! Most Hated &amp; Most Loved? (www.tellsammy.com)">';
				<?php } ?>
				myLoveStr += jsonData[0].items[i].item;
				myLoveStr += '</a> ';
				if ( i != 9 ) myLoveStr += '&nbsp;&nbsp;';
				//Show votes in Blog is checked
				myLoveStr += <?php if ( get_option('tsVote') == 'checked' ) { ?>
							 jsonData[0].items[i].vote 
							 <?php } else { ?>
						 	 ''
							 <?php } ?>;
				myLoveStr += '<br />';
              }
            }

                
            for ( i=0; i<10; i++ ) {
              //null item control
              if ( jsonData[1].items[i].item != "null" ) {
                //Show Rankings in Blog had checked
                <?php if (get_option('tsNumber') == 'checked') { ?>
                myHateStr += (i+1) + '. ';
                if (i!=9) myHateStr += '&nbsp;&nbsp;';
                <?php } ?>
                myHateStr += '<a id="hMy'+i+'" href="javascript:voteForMyList(\'hMy'+i+'\')" ';
                //Show votes in Blog hadn't checked    
                <?php if ( get_option('tsVote') != 'checked' ) { ?>
                myHateStr += 'title="' + jsonData[1].items[i].vote + ' Votes! Most Hated &amp; Most Loved? (www.tellsammy.com)">'; 
                <?php } else { ?>
                myHateStr += 'title="Click To Vote! Most Hated &amp; Most Loved? (www.tellsammy.com)">';
                <?php } ?>

                myHateStr += jsonData[1].items[i].item;
                myHateStr += '</a> ';
                if ( i != 9 ) myHateStr += '&nbsp;&nbsp;';
                //Show votes in Blog is checked
                myHateStr += <?php if ( get_option('tsVote') == 'checked' ) { ?>
                             jsonData[1].items[i].vote 
                              <?php } else { ?>
                              ''
                              <?php } ?>;
                myHateStr += '<br />';
              }
            }

            //----Creating lists without links to use while waiting
            waitLoveStr = "";
            waitHateStr = "";
            
            for ( i=0; i<10; i++ ) {
                if ( jsonData[0].items[i].item != "null" ) {//null item control
                    <?php if ( get_option('tsNumber') == 'checked' ) { ?>
                      waitLoveStr += (i+1) + '. ';
                      if ( i != 9 ) waitLoveStr += '&nbsp;&nbsp;';
                    <?php } ?>
                    waitLoveStr += jsonData[0].items[i].item + ' ';
                    if ( i!=9 ) waitLoveStr += '&nbsp;&nbsp;';                   
                    waitLoveStr += <?php if ( get_option('tsVote') == 'checked' ) { ?>
                               jsonData[0].items[i].vote
                               <?php } else { ?>
                               ''
                               <?php } ?>;
                    waitLoveStr += '<br />';
                }
            }
                    
            for ( i=0; i<10; i++ ) {
                //null item control
                if ( jsonData[1].items[i].item != "null" ) {
                  <?php if ( get_option('tsNumber') == 'checked' ) { ?>
                  waitHateStr += (i+1) + '. ';
                  if ( i!=9 ) waitHateStr += '&nbsp;&nbsp;';
                  <?php } ?>
                  waitHateStr += jsonData[1].items[i].item + ' ';
                  if ( i != 9 ) waitHateStr += '&nbsp;&nbsp;';                   
                  waitHateStr += <?php if ( get_option('tsVote') == 'checked' ) { ?>
                                 jsonData[1].items[i].vote
                                 <?php } else { ?>
                                 ''
                                 <?php } ?>;
                  waitHateStr += '<br />';
                }
            }
            //---END Creating lists without links to use while waiting---------------
            
            document.getElementById('myLovediv').innerHTML = myLoveStr;
            document.getElementById('myHatediv').innerHTML = myHateStr;
            bObj3.removeScriptTag();
            
        }//----END getMyHatedLoved

        toGetMyHatedLoved(blogUrl, ak, love, hate);    

    </script>
   
<?php 
      
   }//--------END showHatedLovedWg
    
  //--------Adding to Admin Menu and Creating Option Page-----------

  add_action('admin_menu', 'tsAddPages');// Hook for adding admin menus
  
  function tsAddPages() {// action function for above hook
     
    add_menu_page('Tell Sammy', 'Tell Sammy', 8, __FILE__, 'tsOptionsPage'); // Add a new submenu under Options:
    
    add_action("admin_print_scripts", 'addJsrScript');//to add our script to our admin pages
                                                     //also for widget menu
    function addJsrScript(){// to add jsr script
                
         if (function_exists('wp_enqueue_script')) {
            
             wp_enqueue_script('jsr', 'http://www.tellsammy.com/js/jsr.js', false);
             wp_enqueue_script('tswp', 'http://www.tellsammy.com/js/tswp.js', false);
             
         }
            
    }//END addJsrScript()
    
  }//END tsAddPages()

  function tsOptionsPage() {// tsOptionsPage() displays the page content for the Tell Sammy Options
    
      $blogUrl = '"'.get_bloginfo('wpurl').'"';    
?>
    
   <form method="post" action="options.php">
  
       <?php wp_nonce_field('update-options'); ?>

        <?php 
            $exit = 0;
            $i    = 1;
            while ( $exit == 0 ) {//searching for a hated option that will be used to save entered item

                $hatedName = "tsHated".$i;
                if ( get_option($hatedName) == false ) $exit = 1;

                if( $i == 11) $exit = 1;
                
                $i++;
            }

            $exit = 0;
            $i    = 1;
            while ( $exit == 0 ) {//searching for a loved option that will be used to save entered item

                $lovedName = "tsLoved".$i;
                if ( get_option($lovedName) == false ) $exit = 1;

                if ( $i==11 ) $exit = 1;
                
                $i++;
            }

         ?>

     <table border="0" ><!-- outer table-->  
      <tr><!-- outer table-->  
        <td style="padding-left:20px; border-color:#CCCCCC;border-style:solid;border-width:1px;  width:200px" BGCOLOR="#F3F3F3"> <!-- büyüktable-->
            <h3>Account Settings</h3>
            <table border="0">
              <tr>
                <td>Name:</td>
                <td colspan="3"><input type="text" name="tsName" size="12" value="<?php echo get_option('tsName'); ?>" /></td>
              </tr>
              <tr>
                <td>Surname:</td>
                <td colspan="3"><input type="text" name="tsSurname" size="12" value="<?php echo get_option('tsSurname'); ?>" /></td>
              </tr>
              <tr>
                <td>Sex:</td>
                <td colspan="3"><select style="width:116px" name="tsSex">
                        <option value="<?php echo get_option('tsSex'); ?>">
                        <?php if ( get_option('tsSex') == 'male' ) echo ("Male");
                              if ( get_option('tsSex') == 'female' ) echo ("Female");
                        ?></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>Place:</td>
                <td colspan="3"><input type="text" name="tsPlace" size="12" value="<?php echo get_option('tsPlace'); ?>" /></td>
              </tr>
              <tr>
                 <td>Birthday:</td>
              </tr>
              <tr>
                <td>-Day:</td>
                <td><select style="width:116px" id="tsDay" style="width: 70px;" name="tsDay">
                        <option value="<?php echo get_option('tsDay'); ?>">
                            <?php if ( get_option('tsDay') != false ) echo get_option('tsDay');else echo("Day");?>
                        </option>
                        <?php 
                            for ( $i=1; $i<10; $i++ ) {// for days 1-9 to add 0 their front
                        ?>
                                <option value="0<?php echo ($i);?>"><?php echo ($i); ?></option>        
                        <?php    
                            }
                        ?>
                        <?php 
                            for ( $i=10; $i<32; $i++ ) {// for days 10-31
                        ?>
                                <option value="<?php echo ($i);?>"><?php echo ($i); ?></option>        
                        <?php    
                            }
                        ?>

                    </select>
                </td>
              </tr>
              <tr>
                <td>-Month:</td>
                <td><select style="width:116px" id="tsMonth" style="width: 70px;" name="tsMonth">
                        <option value="<?php echo get_option('tsMonth'); ?>">
                            <?php if ( get_option('tsMonth') != false ) {
                                    if ( get_option('tsMonth') == '01' ) echo ("January");
                                    if ( get_option('tsMonth') == '02' ) echo ("February");
                                    if ( get_option('tsMonth') == '03' ) echo ("March");
                                    if ( get_option('tsMonth') == '04' ) echo ("April");
                                    if ( get_option('tsMonth') == '05' ) echo ("May");
                                    if ( get_option('tsMonth') == '06' ) echo ("June");
                                    if ( get_option('tsMonth') == '07' ) echo ("July");
                                    if ( get_option('tsMonth') == '08' ) echo ("August");
                                    if ( get_option('tsMonth') == '09' ) echo ("September");
                                    if ( get_option('tsMonth') == '10' ) echo ("October");
                                    if ( get_option('tsMonth') == '11' ) echo ("November");
                                    if ( get_option('tsMonth') == '12' ) echo ("December");
                                  
                                  } else echo ("Month");                          
                            
                            ?>
                        </option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </td>
              </tr>
                    <?php $currentYear = date ("Y");// get current year?>
              <tr>
                <td>-Year:</td>
                <td><select style="width:116px" id="tsYear" style="width: 70px;" name="tsYear">
                        <option value="<?php echo get_option('tsYear'); ?>">
                            <?php if ( get_option('tsYear') != false )echo get_option('tsYear'); else echo("Year");?>
                        </option>
                        <?php 
                            for ( $i=1900; $i < $currentYear+1; $i++ ) {
                        ?>
                                <option value="<?php echo($i);?>"><?php echo($i); ?></option>        
                        <?php    
                            }
                        ?>
                    </select>
                </td>
              </tr>
              
            </table>
            <br />
            <input type="checkbox" name="tsVote" value="checked" <?php echo get_option('tsVote'); ?> /> Show Votes In Blog
            <br /><br />
            <input type="checkbox" name="tsNumber" value="checked" <?php echo get_option('tsNumber'); ?> /> Show Rankings In Blog
            <br /><br />
            <input type="submit" style="width:120px; position:relative; left:62px; " name="Submit" value="<?php echo('Save Changes'); ?>" />
            

        </td><!-- outer table--> 
        
        <td style="width:70px"></td>
        
        <td style="padding-right:10px; width:500px"> <!-- outer table-->
        
          <img src="../wp-content/plugins/tell-sammy/img/s_fb.gif" />
          <br /><br />
           Hi, I'm Sammy! Tell me what you love and what you hate the most! 
           If you want<br /> to check out my list,
          <a target="_blank" href="http://www.tellsammy.com/sammy.jsp">click here!</a>
          <br /><br />
            <table border="0" style=" width:489px; border-style: solid none none; border-color: #e7e7e7; border-width: 1px;">   
              <tr><!-- id and the values that sending to the javascript function must be same. Exp: tsHated1 -->
                <td style="padding-top:10px; padding-right:10px;">
                  <b><h3>Most Hated</h3></b>
                  <table border="0">
                    <tr>
                        <td>1.&nbsp;&nbsp; <a id="tsHated1" href="javascript:takeForDelete('tsHated1');" ><?php echo get_option('tsHated1');?></a></td>    
                    </tr>
                    <tr>
                        <td>2.&nbsp;&nbsp; <a id="tsHated2" href="javascript:takeForDelete('tsHated2');" ><?php echo get_option('tsHated2');?></a></td>
                    </tr>              
                    <tr>
                        <td>3.&nbsp;&nbsp; <a id="tsHated3" href="javascript:takeForDelete('tsHated3');" ><?php echo get_option('tsHated3');?></a></td>
                    </tr>
                    <tr>
                        <td>4.&nbsp;&nbsp; <a id="tsHated4" href="javascript:takeForDelete('tsHated4');" ><?php echo get_option('tsHated4');?></a></td>       
                    </tr>
                    <tr>
                        <td>5.&nbsp;&nbsp; <a id="tsHated5" href="javascript:takeForDelete('tsHated5');" ><?php echo get_option('tsHated5');?></a></td>
                    </tr>
                    <tr>
                        <td>6.&nbsp;&nbsp; <a id="tsHated6" href="javascript:takeForDelete('tsHated6');" ><?php echo get_option('tsHated6');?></a></td>    
                    </tr>
                    <tr>
                        <td>7.&nbsp;&nbsp; <a id="tsHated7" href="javascript:takeForDelete('tsHated7');" ><?php echo get_option('tsHated7');?></a></td>
                    </tr>              
                    <tr>
                        <td>8.&nbsp;&nbsp; <a id="tsHated8" href="javascript:takeForDelete('tsHated8');" ><?php echo get_option('tsHated8');?></a></td>
                    </tr>
                    <tr>
                        <td>9.&nbsp;&nbsp; <a id="tsHated9" href="javascript:takeForDelete('tsHated9');" ><?php echo get_option('tsHated9');?></a></td>       
                    </tr>
                    <tr>
                        <td>10. <a id="tsHated10" href="javascript:takeForDelete('tsHated10');" ><?php echo get_option('tsHated10');?></a></td>
                    </tr>

                  </table>
                    <input type="text" onkeypress="tsUpperCase('hateTextBox', event);" id="hateTextBox" name="<?php echo ($hatedName);?>" size="20" maxlength="23"/>
                    <input type="submit" onclick="tsUpperCase('hateTextBox', event);" id="hateSubmit" name="hateSubmit" value="<?php echo('GO!'); ?>" />
                </td>

                <td width="1px"  style="padding-top:10px;"><img src="../wp-content/plugins/tell-sammy/img/line.gif" style="height:220px;width:1px;"/></td>

                <td style="padding-top:10px; padding-left:10px;">
                <b><h3>Most Loved</h3></b>
                  <table border="0">
                    <tr>
                        <td>1.&nbsp;&nbsp; <a id="tsLoved1" href="javascript:takeForDelete('tsLoved1');" ><?php echo get_option('tsLoved1');?></a></td>
                    </tr>
                    <tr>
                        <td>2.&nbsp;&nbsp; <a id="tsLoved2" href="javascript:takeForDelete('tsLoved2');" ><?php echo get_option('tsLoved2');?></a></td>
                    </tr>
                    <tr>
                        <td>3.&nbsp;&nbsp; <a id="tsLoved3" href="javascript:takeForDelete('tsLoved3');" ><?php echo get_option('tsLoved3');?></a></td>
                    </tr>
                    <tr>
                        <td>4.&nbsp;&nbsp; <a id="tsLoved4" href="javascript:takeForDelete('tsLoved4');" ><?php echo get_option('tsLoved4');?></a></td>
                    </tr>
                    <tr>
                        <td>5.&nbsp;&nbsp; <a id="tsLoved5" href="javascript:takeForDelete('tsLoved5');" ><?php echo get_option('tsLoved5');?></a></td>
                    </tr>
                    <tr>
                        <td>6.&nbsp;&nbsp; <a id="tsLoved6" href="javascript:takeForDelete('tsLoved6');" ><?php echo get_option('tsLoved6');?></a></td>
                    </tr>
                    <tr>
                        <td>7.&nbsp;&nbsp; <a id="tsLoved7" href="javascript:takeForDelete('tsLoved7');" ><?php echo get_option('tsLoved7');?></a></td>
                    </tr>
                    <tr>
                        <td>8.&nbsp;&nbsp; <a id="tsLoved8" href="javascript:takeForDelete('tsLoved8');" ><?php echo get_option('tsLoved8');?></a></td>
                    </tr>
                    <tr>
                        <td>9.&nbsp;&nbsp; <a id="tsLoved9" href="javascript:takeForDelete('tsLoved9');" ><?php echo get_option('tsLoved9');?></a></td>
                    </tr>
                    <tr>
                        <td>10. <a id="tsLoved10" href="javascript:takeForDelete('tsLoved10');" ><?php echo get_option('tsLoved10');?></a></td>
                    </tr>
                  </table>
                    <input type="text" onkeypress="tsUpperCase('loveTextBox', event);" id="loveTextBox"  name="<?php echo ($lovedName)?>" size="20" maxlength="23" />
                    <input type="submit" onclick="tsUpperCase('loveTextBox', event);" id="loveSubmit" name="loveSubmit" value="<?php echo('GO!'); ?>" />
                  </td>
              </tr>
            </table>
            <div style="visibility:hidden;" id="delDiv">

                <input type= "text" size="20" style="position:relative; left:3px;" id= "delText" readonly />

                <input type="hidden" id="itemDelete" size="15" value="" /><!-- name will come from javascript function -->

                <input type="submit" style="position:relative; left:3px;" name="delSubmit" value="<?php echo('Remove Item'); ?>" />

                <input onclick="delCancel();" type="button" name="delCancelButton" value="<?php echo('Cancel'); ?>" />
            </div>
            
        </td><!-- outer table-->                           
      </tr><!-- outer table-->
     </table><!-- outer table-->
        
        <?php

            if ( get_option('tsName') == false ) update_option('tsName', "");
            if ( get_option('tsSurname') == false ) update_option('tsSurname', ""); 
            if ( get_option('tsSex') == false ) $sex = "";
            if ( get_option('tsSex') == 'male' ) $sex = 0;
            if ( get_option('tsSex') == 'female') $sex = 1;          
            if ( get_option('tsPlace') == false ) update_option('tsPlace', ""); 

        ?>
        <script type="text/javascript">

            blogUrl      = <?php echo $blogUrl; ?>;
            tsName       = '<?php echo get_option('tsName'); ?>';
            tsSurname    = '<?php echo get_option('tsSurname'); ?>';
            tsSex        = '<?php echo $sex; ?>';
            tsBirthdate  = "";
            tsBirthdate += '<?php echo get_option('tsYear'); ?>';
            tsBirthdate += '-';
            tsBirthdate += '<?php echo get_option('tsMonth'); ?>';
            tsBirthdate += '-';
            tsBirthdate += '<?php echo get_option('tsDay'); ?>';
            tsReligion   = "";
            tsPlace      = '<?php echo get_option('tsPlace'); ?>';
    
            toGetAccessKey(blogUrl, tsName, tsSurname, tsSex, tsBirthdate, tsReligion, tsPlace);
           
        </script>
         
         
        <input type="hidden" id="tsAccessKey" name="tsAccessKey" />

        <input type="hidden" name="action" 
        value="update" />

        <input type="hidden" id="page_options" name="page_options" 
        value="<?php echo($hatedName);?>, <?php echo($lovedName);?>,
        tsVote, tsNumber, tsAccessKey, tsName, tsSurname, tsSex, tsDay, tsMonth, tsYear, tsPlace" />
    
   </form>
   
 <?php
    
  }//END tsOptionsPage()

//----END Adding to Admin Menu and Creating Option Page-----

 ?>
