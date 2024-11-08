@extends('layouts.app')

@section('title')
    Sign In
@endsection

@section('content')
    <div class="container register-container">
        <div class="col-lg-6 col-md-8 col-xs-12">
            <div class="p-4">
                <div class="register-top">
                    <button class="btn-close" type="button" onclick="window.location.href='{{ route('main') }}'"
                        aria-label="Close"></button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h6>هناك بعض الأخطاء في البيانات المدخلة:</h6>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h3 class="register-title">
                    تسجيل حساب
                </h3>
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <input name="first_name" type="text"
                            class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                            value="{{ old('first_name') }}" placeholder="الإسم" required>
                        @if ($errors->has('first_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('first_name') }}
                            </div>
                        @endif
                        <span class="help-block"> </span>
                    </div>
                    <div class="mb-3">
                        <input name="last_name" type="text"
                            class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                            value="{{ old('last_name') }}" placeholder="العائلة" required>
                        @if ($errors->has('last_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_name') }}
                            </div>
                        @endif
                        <span class="help-block"> </span>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <select name="phone_code" class="form-select" title="Country Code">
                                <!-- Add more country codes as needed -->
                                <option value="+1">United States +1</option>
                                <option value="+7">Russia +7</option>
                                <option value="+20">Egypt +20</option>
                                <option value="+27">South Africa +27</option>
                                <option value="+30">Greece +30</option>
                                <option value="+31">Netherlands +31</option>
                                <option value="+32">Belgium +32</option>
                                <option value="+33">France +33</option>
                                <option value="+34">Spain +34</option>
                                <option value="+36">Hungary +36</option>
                                <option value="+39">Italy +39</option>
                                <option value="+40">Romania +40</option>
                                <option value="+41">Switzerland +41</option>
                                <option value="+43">Austria +43</option>
                                <option value="+44">United Kingdom +44</option>
                                <option value="+45">Denmark +45</option>
                                <option value="+46">Sweden +46</option>
                                <option value="+47">Norway +47</option>
                                <option value="+48">Poland +48</option>
                                <option value="+49">Germany +49</option>
                                <option value="+51">Peru +51</option>
                                <option value="+52">Mexico +52</option>
                                <option value="+53">Cuba +53</option>
                                <option value="+54">Argentina +54</option>
                                <option value="+55">Brazil +55</option>
                                <option value="+56">Chile +56</option>
                                <option value="+57">Colombia +57</option>
                                <option value="+58">Venezuela +58</option>
                                <option value="+60">Malaysia +60</option>
                                <option value="+61">Christmas Island +61</option>
                                <option value="+62">Indonesia +62</option>
                                <option value="+63">Philippines +63</option>
                                <option value="+64">New Zealand +64</option>
                                <option value="+65">Singapore +65</option>
                                <option value="+66">Thailand +66</option>
                                <option value="+77">Kazakhstan +77</option>
                                <option value="+81">Japan +81</option>
                                <option value="+82">South Korea +82</option>
                                <option value="+84">Vietnam +84</option>
                                <option value="+86">China +86</option>
                                <option value="+90">Turkey +90</option>
                                <option value="+91">India +91</option>
                                <option value="+92">Pakistan +92</option>
                                <option value="+93">Afghanistan +93</option>
                                <option value="+94">Sri Lanka +94</option>
                                <option value="+95">Myanmar (Burma) +95</option>
                                <option value="+98">Iran +98</option>
                                <option value="+211">South Sudan +211</option>
                                <option value="+212">Morocco +212</option>
                                <option value="+213">Algeria +213</option>
                                <option value="+216">Tunisia +216</option>
                                <option value="+218">Libya +218</option>
                                <option value="+220">Gambia +220</option>
                                <option value="+221">Senegal +221</option>
                                <option value="+222">Mauritania +222</option>
                                <option value="+223">Mali +223</option>
                                <option value="+224">Guinea +224</option>
                                <option value="+226">Burkina Faso +226</option>
                                <option value="+227">Niger +227</option>
                                <option value="+228">Timor-Leste +228</option>
                                <option value="+229">Benin +229</option>
                                <option value="+230">Mauritius +230</option>
                                <option value="+231">Liberia +231</option>
                                <option value="+232">Sierra Leone +232</option>
                                <option value="+233">Ghana +233</option>
                                <option value="+234">Nigeria +234</option>
                                <option value="+235">Central African Republic +235</option>
                                <option value="+237">Cameroon +237</option>
                                <option value="+238">Cape Verde +238</option>
                                <option value="+239">S o Tom and Principe +239</option>
                                <option value="+240">Equatorial Guinea +240</option>
                                <option value="+241">Gabon +241</option>
                                <option value="+244">Angola +244</option>
                                <option value="+245">Guinea-Bissau +245</option>
                                <option value="+246">British Indian Ocean Territory +246</option>
                                <option value="+248">Seychelles +248</option>
                                <option value="+250">Rwanda +250</option>
                                <option value="+251">Ethiopia +251</option>
                                <option value="+252">Somalia +252</option>
                                <option value="+253">Djibouti +253</option>
                                <option value="+254">Kenya +254</option>
                                <option value="+255">Tanzania +255</option>
                                <option value="+256">Uganda +256</option>
                                <option value="+257">Burundi +257</option>
                                <option value="+258">Mozambique +258</option>
                                <option value="+261">Madagascar +261</option>
                                <option value="+262">R union +262</option>
                                <option value="+264">Namibia +264</option>
                                <option value="+265">Malawi +265</option>
                                <option value="+266">Lesotho +266</option>
                                <option value="+267">Botswana +267</option>
                                <option value="+268">Swaziland +268</option>
                                <option value="+269">Comoros +269</option>
                                <option value="+291">Eritrea +291</option>
                                <option value="+297">Aruba +297</option>
                                <option value="+298">Faroe Islands +298</option>
                                <option value="+299">Greenland +299</option>
                                <option value="+350">Gibraltar +350</option>
                                <option value="+351">Portugal +351</option>
                                <option value="+352">Luxembourg +352</option>
                                <option value="+353">Ireland +353</option>
                                <option value="+354">Saint Kitts and Nevis +354</option>
                                <option value="+355">Albania +355</option>
                                <option value="+356">Malta +356</option>
                                <option value="+357">Cyprus +357</option>
                                <option value="+358">Finland +358</option>
                                <option value="+359">Bulgaria +359</option>
                                <option value="+370">Lithuania +370</option>
                                <option value="+371">Latvia +371</option>
                                <option value="+372">Estonia +372</option>
                                <option value="+373">Moldova +373</option>
                                <option value="+374">Armenia +374</option>
                                <option value="+375">Belarus +375</option>
                                <option value="+376">Andorra +376</option>
                                <option value="+377">Monaco +377</option>
                                <option value="+378">San Marino +378</option>
                                <option value="+380">Ukraine +380</option>
                                <option value="+381">Serbia +381</option>
                                <option value="+382">Montenegro +382</option>
                                <option value="+383">Kosovo +383</option>
                                <option value="+385">Croatia +385</option>
                                <option value="+386">Slovenia +386</option>
                                <option value="+387">Bosnia and Herzegovina +387</option>
                                <option value="+389">Macedonia (FYROM) +389</option>
                                <option value="+420">Czech Republic +420</option>
                                <option value="+421">Slovakia +421</option>
                                <option value="+423">Liechtenstein +423</option>
                                <option value="+500">Falkland Islands +500</option>
                                <option value="+501">Belize +501</option>
                                <option value="+502">Guatemala +502</option>
                                <option value="+503">El Salvador +503</option>
                                <option value="+504">Honduras +504</option>
                                <option value="+505">Nicaragua +505</option>
                                <option value="+506">Costa Rica +506</option>
                                <option value="+507">Panama +507</option>
                                <option value="+508">Saint Pierre and Miquelon +508</option>
                                <option value="+509">Haiti +509</option>
                                <option value="+590">Saint Lucia +590</option>
                                <option value="+591">Bolivia +591</option>
                                <option value="+592">Guyana +592</option>
                                <option value="+593">Ecuador +593</option>
                                <option value="+594">French Polynesia +594</option>
                                <option value="+595">Paraguay +595</option>
                                <option value="+596">Martinique +596</option>
                                <option value="+597">Suriname +597</option>
                                <option value="+598">Uruguay +598</option>
                                <option value="+599">Netherlands Antilles +599</option>
                                <option value="+670">East Timor +670</option>
                                <option value="+672">Norfolk Island +672</option>
                                <option value="+673">Brunei +673</option>
                                <option value="+674">Nauru +674</option>
                                <option value="+675">Papua New Guinea +675</option>
                                <option value="+676">Tonga +676</option>
                                <option value="+677">Solomon Islands +677</option>
                                <option value="+678">Vanuatu +678</option>
                                <option value="+679">Fiji +679</option>
                                <option value="+680">Palau +680</option>
                                <option value="+681">Wallis and Futuna +681</option>
                                <option value="+682">Cook Islands +682</option>
                                <option value="+683">Niue +683</option>
                                <option value="+684">Samoa +684</option>
                                <option value="+686">Kiribati +686</option>
                                <option value="+687">New Caledonia +687</option>
                                <option value="+688">Tuvalu +688</option>
                                <option value="+691">Micronesia +691</option>
                                <option value="+692">Marshall Islands +692</option>
                                <option value="+784">Saint Vincent and the Grenadines +784</option>
                                <option value="+850">Korea, North +850</option>
                                <option value="+852">Hong Kong +852</option>
                                <option value="+853">Macau +853</option>
                                <option value="+855">Cambodia +855</option>
                                <option value="+856">Laos +856</option>
                                <option value="+880">Bangladesh +880</option>
                                <option value="+886">Taiwan +886</option>
                                <option value="+960">Maldives +960</option>
                                <option value="+961">Lebanon +961</option>
                                <option value="+962">Jordan +962</option>
                                <option value="+963">Syria +963</option>
                                <option value="+964">Iraq +964</option>
                                <option value="+965">Kuwait +965</option>
                                <option value="+966">Saudi Arabia +966</option>
                                <option value="+967">Yemen +967</option>
                                <option value="+968">Oman +968</option>
                                <option value="+970">Palestine +970</option>
                                <option value="+971">United Arab Emirates +971</option>
                                <option value="+973">Bahrain +973</option>
                                <option value="+974">Qatar +974</option>
                                <option value="+975">Bhutan +975</option>
                                <option value="+976">Mongolia +976</option>
                                <option value="+977">Nepal +977</option>
                                <option value="+992">Tajikistan +992</option>
                                <option value="+993">Turkmenistan +993</option>
                                <option value="+994">Azerbaijan +994</option>
                                <option value="+995">Georgia +995</option>
                                <option value="+996">Kyrgyzstan +996</option>
                                <option value="+998">Uzbekistan +998</option>
                                <option value="+1242">Bahamas +1242</option>
                                <option value="+1246">Barbados +1246</option>
                                <option value="+1264">Anguilla +1264</option>
                                <option value="+1268">Antigua and Barbuda +1268</option>
                                <option value="+1284">Virgin Islands, British +1284</option>
                                <option value="+1340">Virgin Islands, U.S. +1340</option>
                                <option value="+1345">Cayman Islands +1345</option>
                                <option value="+1441">Bermuda +1441</option>
                                <option value="+1473">Grenada +1473</option>
                                <option value="+1649">Turks and Caicos Islands +1649</option>
                                <option value="+1664">Montserrat +1664</option>
                                <option value="+1670">Northern Mariana Islands +1670</option>
                                <option value="+1671">Guam +1671</option>
                                <option value="+1684">American Samoa +1684</option>
                                <option value="+1721">Sint Maarten (Dutch part) +1721</option>
                                <option value="+1767">Dominica +1767</option>
                                <option value="+1787">Puerto Rico +1787</option>
                                <option value="+1809">Dominican Republic +1809</option>
                                <option value="+1868">Trinidad and Tobago +1868</option>
                                <option value="+1876">Jamaica +1876</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <input name="phone" type="tel" class="form-control" id="phone"
                                value="{{ old('phone') }}" placeholder="رقم الهاتف">
                            @if ($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block"> </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input name="email" type="email"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            value="{{ old('email') }}" placeholder="البريد الإلكتروني" required>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="help-block"> </span>
                    </div>
                    <div class="mb-3 input-group">
                        <input name="password" type="password" minlength="8" class="form-control"
                            placeholder="رمز المرور" required>
                        <span class="input-group-text">
                            <i class="fa fa-eye"></i>
                        </span>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <span class="help-block"> </span>
                    </div>
                    <div class="mb-3 input-group">
                        <input name="password_confirmation" type="password" minlength="8" class="form-control"
                            placeholder="إعادة إدخال رمز المرور" required>
                        <span class="input-group-text">
                            <i class="fa fa-eye"></i>
                        </span>
                        @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                        <span class="help-block"> </span>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-custom">تأكيد</button>
                    </div>
                    <div class="text-center mt-3">
                        <a class="text-decoration-none" href="{{ route('login') }}">لديك حساب؟ تسجيل الدخول</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
