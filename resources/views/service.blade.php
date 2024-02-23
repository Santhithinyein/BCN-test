<x-layout>
<div class="container">
        <form action="" method="post">
            <h1>ပုကလိက လျှောက်လွှာပုံစံ  </h1>
            <div class="content">
                <div class="input-box">
                    <label for="name">၁။ လုပ္ငန္းအမည္</label>
                    <input type="text" placeholder="နာမည္ အ ျပည့္အစုံရိုက္ထည့္ပါ။" name="name" required>
                </div>
                <div class="input-box">
                    <label for="username">၂။ ပ်ားမေးျမူသူ   မွတ္ပုံတင္ </label>
                    <input type="text" placeholder="မွတ္ပုံတင္အ ျပည့္အစုံရိုက္ထည့္ပါ။" name="uname" required>
                </div>
                <div class="input-box">
                    <label for="email"> ၃။ ဌာနမွ ထုတ္‌ေပးသည့္ရက္စဲြ</label>
                    <input type="email" placeholder="ရက္စဲြအ ျပည့္အစုံရိုက္ထည့္ပါ။" name="email" required>
                </div>
                <div class="input-box">
                    <label for="phone">၄။ ပိုင္ရင္အမည္</label>
                    <input type="tel" placeholder="((က) အဘအမည္/(ခ)မွတ္ပုံတင္အမွတ္ )" name="phone" required>
                </div>
                <div class="input-box">
                    <label for="password">၅။ နေရပ္လိပ္စာ</label>
                    <input type="password" placeholder="လိပ္စာအ ျပည့္အစုံရိုက္ထည့္ပါ။" name="password" required>
                </div>
                <div class="input-box">
                    <label for="confirm-pwd">၆။စတင္ မေး ျမြူသည့္ ရက္စဲြ</label>
                    <input type="password" placeholder="ရက္စဲြ အ ျပည့္အစုံရိုက္ထည့္ပါ။" name="confirmPassword" required>
                </div>
                <div class="input-box">
                    <label for="c1"> ၇။ မွတ္ပုံတင္သည့္ နေရိ ပ်ားအုံ အရေအ တြက္ </label>
                    <input type="p1" placeholder="အရေအတက္ အ ျပည့္အစုံရိုက္ထည့္ပါ။" name="c1" required>
                </div>
                <div class="input-box">
                    <label for="c2"> ၈။စတင္ မွေး မြူ သည့္ ပ်ားအုံ အရေ အ တွက္ </label>
                    <input type="p2" placeholder="အရေ အ တွက္  အ ျပည့္အစုံရိုက္ထည့္ပါ။" name="c2" required>
                </div>
                <div class="input-box">
                    <label for="c3"> ၉။ ပ်ားအုံဝယ္ယူသည့္ဌာန (ပုဂ္ဂို လ္၊ ျမို့ ၊ တိုင္း) </label>
                    <input type="p3" placeholder=" အ ျပည့္အစုံရိုက္ထည့္ပါ။" name="c3" required>
                </div>
                <div class="input-box">
                    <label for="c4"> ၁၀။ လုပ္ငန္း တည္ နေရာ </label>
                    <input type="p4" placeholder="((က)ရပ္ကွက္/(ခ)‌ေရွပြ ‌ျေပာင္းမွေျမြူရာဒေသ/ (ဂ)လုပ္ငန္းသုံးယာဥ္အမီီ်ုူးအစား)" name="c4" required>
                </div>
                <div class="input-box">
                    <label for="c5"> ၁၁။ လုပ္ငန္း တည္ နေရာ </label>
                    <input type="p5" placeholder="(က)ဌာန၊ပုဂ္ဂလိကနင့္ပုဂ္ဂလိကအခ်င္းခ်င္းပူးပေါင္းဆောင္ရွက္မူရရိသူ/((ခ)မွေးမြူအုံအရေအတွက္နင့္  ပ်ားထွက္ပစ္စည္းထုတ္လုပ္မူ ကိန္းဂဏန္းအခ်က္အလက္မ်ား  /(ဂ)G.D.P တောင္းခံမူကို ပံ့ပိုးဆောင္ရွက္သူ)" name="c5" required>
                    
                </div>
                
            </div>
            <div class="alert">
                <p>By clicking sign up,you agree to our <a href="#">Privacy Policy</a> and <a href="#">Cookies Policy</a> .You may receive SMS notifications from us andcan opt out at any time.</p>
                <div class="button-container">
                    <button type="submit">Register</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>