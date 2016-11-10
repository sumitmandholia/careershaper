<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



   <div class="warning_box">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
   </div>
   <div class="valid_box">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
   </div>
   <div class="error_box">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.
   </div>
   <h1>Create New User</h1>
   <hr></hr>
   <div class="form">
      <form action="" method="post" class="niceform">
         <fieldset>
             <dl>
               <dt><label for="name">Name* :</label></dt>
               <dd>
                   <select name="title" id="title">
                       <option value="" selected></option>
                       <option value="Mr.">Mr.</option>
                       <option value="Mrs.">Mrs.</option>
                       <option value="Miss.">Miss</option>
                   </select>
                   <input type="text" name="firstName" id="firstName" placeholder="First" size="15" />
                   <input type="text" name="middleName" id="middleName" placeholder="Middle" size="7" />
                   <input type="text" name="lastName" id="lastName" placeholder="Last" size="15" onblur="validateFields('name',this.value);"/>
                   <img src="../../images/valid.png" id="name_valid" alt="" class='valid_ico'/>
                   <img src="../../images/error.png" id="name_error" alt="" class='valid_ico'/>
               </dd>
            </dl>
            <dl>
               <dt><label for="color">Select User Type</label></dt>
               <dd>
                   <input type="radio" name="userType" id="userType" value="A" onclick="onclickUtype('A');"/>Admin
                  <input type="radio" name="userType" id="userType" value="IU" onclick="onclickUtype('IU');"/>Internal User
                  <input type="radio" name="userType" id="userType" value="EU" onclick="onclickUtype('EU');"/>External User
                </dd>
            </dl>
             <dl class="testType">
                 <dt><label for="testType">Select Test Type*:</label></dt>
                 <dd>
                     <select name="testType" id="testType" size="3" multiple="true" onblur="validateFields(this.id,this.value)">
                         <option value="">test 1</option>
                         <option value="">test 2</option>
                         <option value="">test 3</option>
                         <option value="">test 4</option>
                     </select>
                      <img src="../../images/valid.png" id="testType_valid" alt="" class='valid_ico'/>
                   <img src="../../images/error.png" id="testType_error" alt="" class='valid_ico'/>
                 </dd>
             </dl>
             <dl>
               <dt><label for="username">User Name*:</label></dt>
               <dd>
                   <input type="text" name="uname" id="uname" placeholder="User Name" size="25" onblur="validateFields(this.id,this.value)"/>
                    <img src="../../images/valid.png" id="uname_valid" alt="" class='valid_ico'/>
                   <img src="../../images/error.png" id="uname_error" alt="" class='valid_ico'/>
                   <input type="button" name="checkUName" id="checkUName" value="Check Availability" />
               </dd>
            </dl>
            <dl>
               <dt><label for="password">Password*:</label></dt>
               <dd>
                   <input type="password" name="password" id="password" placeholder="Password" size="25" onblur="validateFields(this.id,this.value);"/>
                    <img src="../../images/valid.png" id="password_valid" alt="" class='valid_ico'/>
                   <img src="../../images/error.png" id="password_error" alt="" class='valid_ico'/>
               </dd>
            </dl>
            <dl>
               <dt><label for="confirmPassword">Confirm Password*:</label></dt>
               <dd>
                   <input type="password" name="cPassword" id="cPassword" placeholder="Re-Enter Password" size="25" onblur="validateFields(this.id,this.value);"/>
                   <img src="../../images/valid.png" id="cPassword_valid" alt="" class='valid_ico'/>
                   <img src="../../images/error.png" id="cPassword_error" alt="" class='valid_ico'/>
               </dd>
            </dl>
            <dl>
               <dt><label for="email">Email Address*:</label></dt>
               <dd>
                   <input type="text" name="email1" id="email1" placeholder="Primary Email-Id" size="25" onblur="validateFields(this.id,this.value);"/>
                   <img src="../../images/valid.png" id="email1_valid" alt="" class='valid_ico'/>
                   <img src="../../images/error.png" id="email1_error" alt="" class='valid_ico'/>
               </dd>
            </dl>
             <dl>
                 <dt><label for="phone">Phone Number*:</label></dt>
                 <dd>
                     <input type="text" name="countryCode" id="countryCode" size="3" value="+91" disabled/>
                     <input type="text" name="phone1" id="phone1" placeholder="Primery Phone Number" size="20" maxlength="10" onblur="validateFields(this.id,this.value);"/>
                     <select name="phone1type" id="phone1type">
                         <option value="M">Mobile</option>
                         <option value="H">Home</option>
                     </select>
                      <img src="../../images/valid.png" id="phone1_valid" alt="" class='valid_ico'/>
                      <img src="../../images/error.png" id="phone1_error" alt="" class='valid_ico'/>
                 </dd>
             </dl>
            
            <dl>
               <dt><label></label></dt>
               <dd>
                  <input type="checkbox" name="TnC" id="" value="" /><label class="check_label">I agree to the <a href="#">terms &amp; conditions</a></label>
               </dd>
            </dl>
            <dl class="submit">
               <input type="submit" name="submitButtom" id="submit" value="Submit" />
            </dl>
             <input type="hidden" name="validationCheck" value="true" />
         </fieldset>
      </form>
   </div>