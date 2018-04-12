 <form id="regForm" action="">

<h1>Register:</h1>

<!-- One "tab" for each step in the form: -->
<div class="tab">
    <div class="row">
               <div class="col-md-6">
                   <p>Membership Id:<input name="memberShip" placeholder="Membership Id" oninput="this.className = ''" disabled="" value="gfdgd"></p>
              </div>
              <div class="col-md-6">
                    <p>Approval Form No:<input type="text" placeholder="Approval Form No" id="ano" name="ano" name="memberShip"  oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Main Applicant Name:<input type="text" placeholder="Applicant Name" id="Mname" name="Mname" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                    <p>Date Of Birth:<input type="date" placeholder="Date Of Birth" id="dob1" name="dob1" oninput="this.className = ''" ></p>
              </div>
              <div class="col-md-6">
                    <p>Co-applicant Name:<input type="text" placeholder="Co-applicant Name" id="Cname" name="Cname" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Date of Birth:<input type="date" placeholder="Date of Birth" id="dob2" name="dob2" oninput="this.className = ''"></p>
              </div>
            
              <div class="col-md-6">
                  <p>Mobile No1:<input type="text" placeholder="Primary Mobile No." id="mob1" required name="mob1"  oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Mobile No2:<input type="text" placeholder="Secondry Mobile No." id="mob2" name="mob2" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                  <p>Phone No:<input type="text" placeholder="Phone No." id="mob2" name="mob2" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                 <p>Email Id:<input type="text" placeholder="Email ID" id="rno"  name="rno" oninput="this.className = ''"></p>
              </div>
               <div class="col-md-6">
                   <p>Address:<input type="text"  placeholder="Address" id="address"  name="address" oninput="this.className = ''"></p>
             </div>
              <div class="col-md-6">
                  <p>Pin Code:<input type="text" placeholder="Pin Code" id="pin" name="pin"  oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                 <p>State:<select  placeholder="Please select State" id="state"  name="state" oninput="this.className = ''"></select></p>
              </div>
               <div class="col-md-6">
                  <p>City:<select type="text" placeholder="Please Select City" id="city"  name="city" oninput="this.className = ''"></select></p>
             </div>
              <div class="col-md-6">
                   <p>First Nominee Name:<input id="firstNomineeName" name="firstNomineeName" placeholder="First Nominee Name" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                    <p>Date of Birth:<input type="date" placeholder="Date of Birth" id="firstNDob" name="firstNDob"  oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Second Nominee Name:<input type="text" placeholder="Second Nominee Name" id="secondNomineeName" name="secondNomineeName" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                    <p>Date Of Birth:<input type="date" placeholder="Date Of Birth" id="secondNDob" name="secondNDob" oninput="this.className = ''" ></p>
              </div>
              <div class="col-md-6">
                    <p>Third Nominee Name:<input type="text" placeholder="Co-applicant Name" id="thirdNomineeName" name="thirdNomineeName" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Date of Birth:<input type="date" placeholder="Date of Birth" id="thirdNDob" name="thirdNDob" oninput="this.className = ''"></p>
              </div>
    </div>
  
 
</div>

<div class="tab">
    <div class="row">
               <div class="col-md-6">
                   <p>Date Of Joining:<input type="date" id="doj" name="doj" placeholder="Date Of Joining" oninput="this.className = ''"></p>
              </div>
              
              <div class="col-md-6">
                   <p>Validity Date:<input type="date" placeholder="Validity Date" id="vdate" required name="vdate" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Person Occupancy:<input type="date" placeholder="Date of Birth" id="occupancy" name="occupancy" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                    <p>Card Type(Season):<select  placeholder="Card Type(Season)" id="ctype" name="ctype" oninput="this.className = ''" >
                        <option value="">Select Card Type</option>  
                            <option value="Red">Red</option>
                            <option value="White">White</option>
                            <option value="Blue">Blue</option>  
                        </select>
                    </p>
              </div>
              <div class="col-md-6">
                    <p>Apartment:<select placeholder="Co-applicant Name" id="apartment"  name="apartment" oninput="this.className = ''" onChange="personoccupancy()">
                        <option value="">Select Apartment</option>
                             <option value="Studio-2">Studio-2</option> 
                             <option value="1 BR-4">1 BR-4</option>  
                            </select>
                    </p>
              </div>
              <div class="col-md-6">
                    <p>Tenure:<select   placeholder="Tenure" id="tenure" name="tenure"  oninput="this.className = ''">
                         <option value="">Select Tenure</option>
                                <option value="01">1</option>
                                <option value="03">3</option>
                                <option value="05">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                    </select>
                    </p>
              </div>
              
              <div class="col-md-6">
                   <p>Person Occupancy:<select placeholder="Date of Birth" name="days" id="days" oninput="this.className = ''">
                     <option value="">Select Days</option>
                          <option value="3N/4D">3N/4D</option>
                          <option value="6N/7D">6N/7D</option>
                      </select>
                   </p>
              </div>
              </div>
</div>

<div class="tab">
            <div class="row">
               <div class="col-md-6">
                   <p>Purchase Amount:<input type="text" id="pamount" required name="pamount" placeholder="Purchase Amount" oninput="this.className = ''"></p>
              </div>
              
              <div class="col-md-6">
                   <p>Admin Amount:<input type="text" placeholder="Admin Amount" id="aamount" name="aamount" oninput="this.className = ''"></p>
              </div>
              
              
              <div class="col-md-6">
                   <p>Total Amount:<input type="text" placeholder="Total Amount" id="tamount" name="tamount" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Initial Payment:<input type="text" placeholder="Initial Payment" id="ipayment" required name="ipayment" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Mode Of Payment:<select oninput="this.className = ''" class="form-control" id="mop" name="mop" required>
                                <option value="">Select Mode Of Payment</option>
                                <option value="card">Card</option>
                                <option value="cheque">Cheque</option>
                                <option value="online">Online</option>
                                <option value="cash">Cash</option>
                                <option value="multiple">Multiple</option>
                            </select> </p>
              </div>
              <div class="col-md-12">
                   <h4 style="padding-left: 2%">Card Details</h4>
              </div>
              <div class="col-md-6">
                   <p>Name of Card Holder:<input type="text" placeholder="Name of Card Holder" name="name_on_card" id="name_on_card" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>First & last 4 digits of Card:<input type="text" placeholder="First & last 4 digits of Card" name="card_number" id="card_number" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Type Of Card:<select oninput="this.className = ''" class="form-control" name="name_of_card" required>
                                           <option value="">Select Type Of Card</option>
                                           <option value="visa">VISA</option>
                                           <option value="master_card">Master Card</option>
                                           <option value="american_express">American Express</option>
                                           <option value="diners">Diners</option>
                                           <option value="rupee">Rupee</option>
                                       </select></p>
              </div><br>
              <div row>
                <h4 style="padding-left: 2%">Cheque Details</h4>
              </div><br>
              <div class="col-md-6">
                   <p>Name of Bank:<input type="text" placeholder="Name of Bank" name="name_of_bank"  id="name_of_bank" oninput="this.className = ''"></p>
              </div>
               <div class="col-md-6">
                   <p>Cheque Number:<input type="text" placeholder="Cheque Number" name="cheque_number" id="cheque_number" oninput="this.className = ''"></p>
              </div><br>
              <div class="row"> <h4 style="padding-left: 2%">Online Payment Details</h4></div>
               <div class="col-md-6">
                   <p>Name On The Cheque:<input type="text" placeholder="Cheque Number" name="name_on_cheque" id="name_on_cheque" oninput="this.className = ''"></p>
              </div>
              <div class="row"><h4 style="padding-left: 2%">Online Payment Details</h4></div>


                <div class="col-md-6">
                   <p>Name of Card Holder:<input type="text" placeholder="Name of Card Holder" name="name_on_card1" id="name_on_card1" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Card Number last 4 digits:<input type="text" placeholder="Card Number last 4 digits" name="card_number1" id="card_number1" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Type Of Card:<select oninput="this.className = ''" class="form-control" name="name_of_card1" required>
                                           <option value="">Select Type Of Card</option>
                                           <option value="visa">VISA</option>
                                           <option value="master_card">Master Card</option>
                                           <option value="american_express">American Express</option>
                                           <option value="diners">Diners</option>
                                           <option value="rupee">Rupee</option>
                                       </select></p>
              </div>
              <div class="col-md-6">
                   <p>Name On The Cheque:<input type="text" placeholder="Cheque Number" name="name_on_cheque" id="name_on_cheque" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Name On The Cheque:<input type="text" placeholder="Cheque Number" name="name_on_cheque" id="name_on_cheque" oninput="this.className = ''"></p>
              </div>
              <div class="col-md-6">
                   <p>Name On The Cheque:<input type="text" placeholder="Cheque Number" name="name_on_cheque" id="name_on_cheque" oninput="this.className = ''"></p>
              </div>
              </div>
</div>

<div class="tab">Login Info:
  <p><input placeholder="Username..." oninput="this.className = ''"></p>
  <p><input placeholder="Password..." oninput="this.className = ''"></p>
</div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

</form> 