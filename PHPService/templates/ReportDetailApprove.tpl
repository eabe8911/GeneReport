<!--POP UP MODAL TO VIEW MEMBER DETAILS AND RESULTS FOR Member Information-->
<style>
    .page {
        display: none;
    }

    .page.active {
        display: block;
    }
</style>
<form method="post" action="{$FormAction}" name="FormApproveDetail" id="FormApproveDetail">
    {$Hiddenfield1}{$Hiddenfield2}{$Hiddenfield3}{$Hiddenfield4}{$Hiddenfield5}{$Hiddenfield6}{$Hiddenfield7}
    <div class="container-fluid" style="width:100%;">
        <div class="row"><br>
            <!---- Member Details ---->
            <input type="hidden" id="uuid">
            <!-- Navigation Button -->
            <button id="navButton" class="btn btn-primary" onclick="navigatePage(event)">查看簽核狀態</button>

            <div class="col-sm-12">
                <div class="card-box" style="height:130%;">
                    <div id="page1" class="page active" class="row">
                        <div class="form-horizontal" role="form">
                            <!---- 第一排 ---->
                            <div class="col-md-4">
                                <!---- 檢測單位 ---->
                                <div class="form-group">
                                    <label for="ReportType" class="col-md-3 control-label">檢測單位:</label>
                                    <div class="col-md-8">

                                        {html_options name=ReportType id=ReportType options=['' => '請選擇...'] +
                                        $ReportTypeOptions
                                        selected=$ReportTypeSelect class="form-control" onchange="checkTestUnit()"
                                        required="required" }

                                    </div>
                                </div>
                                <!---- 姓   名 ---->
                                <div class="form-group" id="proband_name_group">
                                    <label for="proband_name" class="col-md-3 control-label">姓 名:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="proband_name" name="proband_name" class="form-control"
                                            value="{$proband_name}" readonly>
                                        <!-- <p id="proband_name_warning" style="color: red; display: none;">所選檢測單位不需填寫姓名</p> -->
                                    </div>
                                </div>

                                <!---- 報告編號 ---->
                                <div class="form-group">
                                    <label for="ReportID" class="col-md-3 control-label">報告編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportID" name="ReportID" class="form-control" required
                                            value="{$ReportID}" readonly>
                                    </div>
                                </div>
                                <!---- 病歷編號 ---->
                                <div class="form-group">
                                    <label for="PatientID" class="col-md-3 control-label">病歷編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="PatientID" name="PatientID" class="form-control" required
                                            value="{$PatientID}" readonly>
                                    </div>
                                </div>
                                <!---- 檢體編號 ---->
                                <div class="form-group">
                                    <label for="SampleNo" class="col-md-3 control-label">檢體編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleNo" name="SampleNo" class="form-control" required
                                            value="{$SampleNo}" readonly>
                                    </div>
                                </div>
                                <!---- 採檢單號 ---->
                                <div class="form-group">
                                    <label for="scID" class="col-md-3 control-label">採檢單號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="scID" name="scID" class="form-control" required
                                            value="{$scID}" readonly>
                                    </div>
                                </div>
                                <!---- 送檢單位 ---->
                                <div class="form-group">
                                    <label for="HospitalList" class="col-md-3 control-label">送檢單位:</label>
                                    <div class="col-md-8">

                                        <!-- {html_options name=HospitalList id=HospitalList options=['' => '請選擇...'] +
                                                                        $HospitalListOptions
                                                                        selected=$HospitalListSelect class="form-control" required="required"} -->
                                        <select id="HospitalList" name="HospitalList" class="form-control"
                                            onchange="hospitalSubmenu(this, document.getElementById('CustomerName'))">
                                            <option value="">Select a category</option>
                                            <option value="1" {if $HospitalListSelect==1}selected{/if}>輔大醫院</option>
                                            <option value="2" {if $HospitalListSelect==2}selected{/if}>新光醫院</option>
                                            <option value="3" {if $HospitalListSelect==3}selected{/if}>台北市立聯合醫院</option>
                                            <option value="4" {if $HospitalListSelect==4}selected{/if}>台北慈濟醫院</option>
                                            <option value="5" {if $HospitalListSelect==5}selected{/if}>台北榮民總醫院</option>
                                            <option value="6" {if $HospitalListSelect==6}selected{/if}>恩主公醫院</option>
                                            <option value="7" {if $HospitalListSelect==7}selected{/if}>雙和醫院</option>
                                            <option value="8" {if $HospitalListSelect==8}selected{/if}>國泰醫院</option>
                                            <option value="9" {if $HospitalListSelect==9}selected{/if}>怡仁醫院</option>
                                            <option value="10" {if $HospitalListSelect==10}selected{/if}>淡水馬偕醫院</option>
                                            <option value="11" {if $HospitalListSelect==11}selected{/if}>三軍總醫院_台北內湖
                                            </option>
                                            <option value="12" {if $HospitalListSelect==12}selected{/if}>中山醫院</option>
                                            <option value="13" {if $HospitalListSelect==13}selected{/if}>新家生醫_聯新醫院
                                            </option>
                                            <option value="14" {if $HospitalListSelect==14}selected{/if}>台北市立萬芳醫院
                                            </option>
                                            <option value="15" {if $HospitalListSelect==15}selected{/if}>臺北醫學大學附設醫院
                                            </option>
                                            <option value="16" {if $HospitalListSelect==16}selected{/if}>台中國軍總醫院
                                            </option>
                                            <option value="17" {if $HospitalListSelect==17}selected{/if}>統誠醫療</option>
                                            <option value="18" {if $HospitalListSelect==18}selected{/if}>彰化秀傳醫院</option>
                                            <option value="19" {if $HospitalListSelect==19}selected{/if}>
                                                國立臺灣大學醫學院附設醫院雲林分院</option>
                                            <option value="20" {if $HospitalListSelect==20}selected{/if}>光田綜合醫院</option>
                                            <option value="21" {if $HospitalListSelect==21}selected{/if}>澄清綜合醫院中港分院
                                            </option>
                                            <option value="22" {if $HospitalListSelect==22}selected{/if}>竹山秀傳醫院</option>
                                            <option value="23" {if $HospitalListSelect==23}selected{/if}>烏日林新醫院</option>
                                            <option value="24" {if $HospitalListSelect==24}selected{/if}>彰濱秀傳醫院</option>
                                            <option value="25" {if $HospitalListSelect==25}selected{/if}>大千綜合醫院</option>
                                            <option value="26" {if $HospitalListSelect==26}selected{/if}>員榮醫療社團法人員榮醫院
                                            </option>
                                            <option value="27" {if $HospitalListSelect==27}selected{/if}>彰化基督教醫院
                                            </option>
                                            <option value="28" {if $HospitalListSelect==28}selected{/if}>台中榮民總醫院
                                            </option>
                                            <option value="29" {if $HospitalListSelect==29}selected{/if}>台南市立醫院</option>
                                            <option value="30" {if $HospitalListSelect==30}selected{/if}>麻豆新樓醫院</option>
                                            <option value="31" {if $HospitalListSelect==31}selected{/if}>台南新樓醫院</option>
                                            <option value="32" {if $HospitalListSelect==32}selected{/if}>屏東基督教醫院
                                            </option>
                                            <option value="33" {if $HospitalListSelect==33}selected{/if}>高雄長庚醫院</option>
                                            <option value="34" {if $HospitalListSelect==34}selected{/if}>高雄醫學大學附設醫院
                                            </option>
                                            <option value="35" {if $HospitalListSelect==35}selected{/if}>連江醫院</option>
                                            <option value="36" {if $HospitalListSelect==36}selected{/if}>一般客戶or泓采代採
                                            </option>
                                            <option value="37" {if $HospitalListSelect==37}selected{/if}>上明眼科</option>
                                            <option value="38" {if $HospitalListSelect==38}selected{/if}>台灣醫事檢驗學會
                                            </option>
                                            <option value="39" {if $HospitalListSelect==39}selected{/if}>衛福部桃園醫院
                                            </option>
                                        </select>


                                    </div>

                                </div>
                                <!---- 送件人 ---->
                                <div class="form-group ">
                                    <label for="HospitalList_Dr" class="col-md-3 control-label">送件人:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="HospitalList_Dr" name="HospitalList_Dr"
                                            class="form-control" required value="{$HospitalList_Dr}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label for="ReportName" class="col-md-3 control-label">報告名稱:</label>
                                    <div class="col-md-8">

                                        <select id="ReportName" name="ReportName" class="form-control" required
                                            readonly>
                                            <option value="{$ReportName}">{$ReportName}</option>
                                        </select>
                                    </div>
                                </div>
                                <!---- 檢測方法 ---->
                                <div class="form-group">
                                    <label for="method" class="col-md-3 control-label">檢測方法:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="method" name="method" class="form-control" required
                                            value="{$method}" readonly>
                                    </div>
                                </div>


                                <!---- 採集日期 ---->
                                <div class="form-group">
                                    <label for="scdate" class="col-md-3 control-label">採集日期:</label>
                                    <div class="col-md-8">
                                        <input type="datetime-local" id="scdate" name="scdate" class="form-control"
                                            required value="{$scdate}" readonly>
                                    </div>
                                </div>
                                <!---- 收檢日期 ---->
                                <div class="form-group">
                                    <label for="rcdate" class="col-md-3 control-label">收檢日期:</label>
                                    <div class="col-md-8">
                                        <input type="datetime-local" id="rcdate" name="rcdate" class="form-control"
                                            required value="{$rcdate}" readonly>
                                    </div>
                                </div>
                                <!---- 送檢日期 ---->
                                <div class="form-group">
                                    <label for="Submitdate" class="col-md-3 control-label">送檢日期:</label>
                                    <div class="col-md-8">
                                        <input type="datetime-local" id="Submitdate" name="Submitdate"
                                            class="form-control" required value="{$Submitdate}" readonly>
                                    </div>
                                </div>

                            </div>
                            <!---- 第二排 ---->
                            <div class="col-md-4">

                                <!---- 樣品種類一 ---->
                                <fieldset>
                                    <legend>樣品一</legend>
                                    <div class="form-group">
                                        <label for="SampleType_1" class="col-md-3 control-label">樣品種類一:</label>
                                        <div class="col-md-8">
                                            <select id="SampleType_1" name="SampleType_1" class="form-control" required
                                                onchange="updateUnit_1()" disabled>
                                                <option value="">請選擇樣品種類</option>
                                                <option value="EDTA紫頭管-全血" {if $SampleType_1=="EDTA紫頭管-全血"
                                                    }selected{/if}>
                                                    EDTA紫頭管-全血</option>
                                                <option value="Streck cfDNA BCT(迷彩管)-全血" {if
                                                    $SampleType_1=="Streck cfDNA BCT(迷彩管)-全血" }selected{/if}>Streck
                                                    cfDNA
                                                    BCT(迷彩管)-全血</option>
                                                <option value="Streck RNA Complete BCT(橘頭管)-全血" {if
                                                    $SampleType_1=="Streck RNA Complete BCT(橘頭管)-全血" }selected{/if}>
                                                    Streck
                                                    RNA Complete BCT(橘頭管)-全血</option>
                                                <option value="5 ㎛ FFPE玻片(不含圈片)" {if $SampleType_1=="5 ㎛ FFPE玻片(不含圈片)"
                                                    }selected{/if}>5 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="10 ㎛ FFPE玻片(不含圈片)" {if $SampleType_1=="10 ㎛ FFPE玻片(不含圈片)"
                                                    }selected{/if}>10 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="染色圈片" {if $SampleType_1=="染色圈片" }selected{/if}>染色圈片
                                                </option>
                                                <option value="粗針穿刺檢體" {if $SampleType_1=="粗針穿刺檢體" }selected{/if}>粗針穿刺檢體
                                                </option>
                                                <option value="gDNA" {if $SampleType_1=="gDNA" }selected{/if}>gDNA
                                                </option>
                                                <option value="口腔拭子-口腔黏膜細胞" {if $SampleType_1=="口腔拭子-口腔黏膜細胞"
                                                    }selected{/if}>
                                                    口腔拭子-口腔黏膜細胞</option>
                                                <option value="生資分析" {if $SampleType_1=="生資分析" }selected{/if}>生資分析
                                                </option>
                                                <option value="細胞懸浮液" {if $SampleType_1=="細胞懸浮液" }selected{/if}>細胞懸浮液
                                                </option>
                                                <option value="其他(請手動輸入樣品種類)" {if $SampleType_1=="其他(請手動輸入樣品種類)"
                                                    }selected{/if}>其他(請手動輸入樣品種類)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- 樣品數量一 (with unit next to the input) -->
                                    <div class="form-group row">
                                        <label for="SampleQuantity_1" class="col-md-3 control-label">樣品數量一:</label>
                                        <div class="col-md-8 input-group">
                                            <input type="number" id="SampleQuantity_1" name="SampleQuantity_1"
                                                class="form-control" value="{$SampleQuantity_1}" readonly>
                                            <span class="input-group-addon" id="SampleUnit_1"
                                                readonly>{$SampleUnit_1}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>樣品二</legend>

                                    <!---- 樣品種類二 ---->
                                    <div class="form-group">
                                        <label for="SampleType_2" class="col-md-3 control-label">樣品種類二:</label>
                                        <div class="col-md-8">
                                            <select id="SampleType_2" name="SampleType_2" class="form-control"
                                                onchange="updateUnit_2()" disabled>
                                                <option value="">請選擇樣品種類</option>
                                                <option value="EDTA紫頭管-全血" {if $SampleType_2=="EDTA紫頭管-全血"
                                                    }selected{/if}>
                                                    EDTA紫頭管-全血</option>
                                                <option value="Streck cfDNA BCT(迷彩管)-全血" {if
                                                    $SampleType_2=="Streck cfDNA BCT(迷彩管)-全血" }selected{/if}>Streck
                                                    cfDNA
                                                    BCT(迷彩管)-全血</option>
                                                <option value="Streck RNA Complete BCT(橘頭管)-全血" {if
                                                    $SampleType_2=="Streck RNA Complete BCT(橘頭管)-全血" }selected{/if}>
                                                    Streck
                                                    RNA Complete BCT(橘頭管)-全血</option>
                                                <option value="5 ㎛ FFPE玻片(不含圈片)" {if $SampleType_2=="5 ㎛ FFPE玻片(不含圈片)"
                                                    }selected{/if}>5 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="10 ㎛ FFPE玻片(不含圈片)" {if $SampleType_2=="10 ㎛ FFPE玻片(不含圈片)"
                                                    }selected{/if}>10 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="染色圈片" {if $SampleType_2=="染色圈片" }selected{/if}>染色圈片
                                                </option>
                                                <option value="粗針穿刺檢體" {if $SampleType_2=="粗針穿刺檢體" }selected{/if}>粗針穿刺檢體
                                                </option>
                                                <option value="gDNA" {if $SampleType_2=="gDNA" }selected{/if}>gDNA
                                                </option>
                                                <option value="口腔拭子-口腔黏膜細胞" {if $SampleType_2=="口腔拭子-口腔黏膜細胞"
                                                    }selected{/if}>
                                                    口腔拭子-口腔黏膜細胞</option>
                                                <option value="生資分析" {if $SampleType_2=="生資分析" }selected{/if}>生資分析
                                                </option>
                                                <option value="細胞懸浮液" {if $SampleType_2=="細胞懸浮液" }selected{/if}>細胞懸浮液
                                                </option>
                                                <option value="其他(請手動輸入樣品種類)" {if $SampleType_2=="其他(請手動輸入樣品種類)"
                                                    }selected{/if}>其他(請手動輸入樣品種類)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- 樣品數量二 (with unit next to the input) -->
                                    <div class="form-group row">
                                        <label for="SampleQuantity_2" class="col-md-3 control-label">樣品數量二:</label>
                                        <div class="col-md-8 input-group">
                                            <input type="number" id="SampleQuantity_2" name="SampleQuantity_2"
                                                class="form-control" value="{$SampleQuantity_2}" readonly>
                                            <span class="input-group-addon" id="SampleUnit_2"
                                                readonly>{$SampleUnit_2}</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>樣品三</legend>

                                    <!---- 樣品種類三 ---->
                                    <div class="form-group ">
                                        <label for="SampleType_3" class="col-md-3 control-label">樣品種類三:</label>
                                        <div class="col-md-8">
                                            <select id="SampleType_3" name="SampleType_3" class="form-control"
                                                onchange="updateUnit_3()" disabled>
                                                <option value="">請選擇樣品種類</option>
                                                <option value="EDTA紫頭管-全血" {if $SampleType_3=="EDTA紫頭管-全血"
                                                    }selected{/if}>
                                                    EDTA紫頭管-全血</option>
                                                <option value="Streck cfDNA BCT(迷彩管)-全血" {if
                                                    $SampleType_3=="Streck cfDNA BCT(迷彩管)-全血" }selected{/if}>Streck
                                                    cfDNA
                                                    BCT(迷彩管)-全血</option>
                                                <option value="Streck RNA Complete BCT(橘頭管)-全血" {if
                                                    $SampleType_3=="Streck RNA Complete BCT(橘頭管)-全血" }selected{/if}>
                                                    Streck
                                                    RNA Complete BCT(橘頭管)-全血</option>
                                                <option value="5 ㎛ FFPE玻片(不含圈片)" {if $SampleType_3=="5 ㎛ FFPE玻片(不含圈片)"
                                                    }selected{/if}>5 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="10 ㎛ FFPE玻片(不含圈片)" {if $SampleType_3=="10 ㎛ FFPE玻片(不含圈片)"
                                                    }selected{/if}>10 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="染色圈片" {if $SampleType_3=="染色圈片" }selected{/if}>染色圈片
                                                </option>
                                                <option value="粗針穿刺檢體" {if $SampleType_3=="粗針穿刺檢體" }selected{/if}>粗針穿刺檢體
                                                </option>
                                                <option value="gDNA" {if $SampleType_3=="gDNA" }selected{/if}>gDNA
                                                </option>
                                                <option value="口腔拭子-口腔黏膜細胞" {if $SampleType_3=="口腔拭子-口腔黏膜細胞"
                                                    }selected{/if}>
                                                    口腔拭子-口腔黏膜細胞</option>
                                                <option value="生資分析" {if $SampleType_3=="生資分析" }selected{/if}>生資分析
                                                </option>
                                                <option value="細胞懸浮液" {if $SampleType_3=="細胞懸浮液" }selected{/if}>細胞懸浮液
                                                </option>
                                                <option value="其他(請手動輸入樣品種類)" {if $SampleType_3=="其他(請手動輸入樣品種類)"
                                                    }selected{/if}>其他(請手動輸入樣品種類)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="SampleQuantity_3" class="col-md-3 control-label">樣品數量三:</label>
                                        <div class="col-md-8 input-group">
                                            <input type="number" id="SampleQuantity_3" name="SampleQuantity_3"
                                                class="form-control" value="{$SampleQuantity_3}" readonly>
                                            <span class="input-group-addon" id="SampleUnit_3"
                                                readonly>{$SampleUnit_3}</span>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend>樣品四</legend>

                                    <!---- 樣品種類四 ---->
                                    <div class="form-group ">
                                        <label for="SampleType_4" class="col-md-3 control-label">樣品種類四:</label>
                                        <div class="col-md-8">
                                            <select id="SampleType_4" name="SampleType_4" class="form-control"
                                                onchange="updateUnit_4()" disabled>
                                                <option value="">請選擇樣品種類</option>
                                                <option value="EDTA紫頭管-全血" {if $SampleType_4=="EDTA紫頭管-全血"
                                                    }selected{/if}>
                                                    EDTA紫頭管-全血</option>
                                                <option value="Streck cfDNA BCT(迷彩管)-全血" {if
                                                    $SampleType_4=="Streck cfDNA BCT(迷彩管)-全血" }selected{/if}>Streck
                                                    cfDNA
                                                    BCT(迷彩管)-全血</option>
                                                <option value="Streck RNA Complete BCT(橘頭管)-全血" {if
                                                    $SampleType_4=="Streck RNA Complete BCT(橘頭管)-全血" }selected{/if}>
                                                    Streck
                                                    RNA Complete BCT(橘頭管)-全血</option>
                                                <option value="5 ㎛ FFPE玻片(不含圈片)" {if $SampleType_4=="5 ㎛ FFPE玻片(不含圈片)"
                                                    }selected{/if}>5 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="10 ㎛ FFPE玻片(不含圈片)" {if $SampleType_4=="10 ㎛ FFPE玻片(不含圈片)"
                                                    }selected{/if}>10 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="染色圈片" {if $SampleType_4=="染色圈片" }selected{/if}>染色圈片
                                                </option>
                                                <option value="粗針穿刺檢體" {if $SampleType_4=="粗針穿刺檢體" }selected{/if}>粗針穿刺檢體
                                                </option>
                                                <option value="gDNA" {if $SampleType_4=="gDNA" }selected{/if}>gDNA
                                                </option>
                                                <option value="口腔拭子-口腔黏膜細胞" {if $SampleType_4=="口腔拭子-口腔黏膜細胞"
                                                    }selected{/if}>
                                                    口腔拭子-口腔黏膜細胞</option>
                                                <option value="生資分析" {if $SampleType_4=="生資分析" }selected{/if}>生資分析
                                                </option>
                                                <option value="細胞懸浮液" {if $SampleType_4=="細胞懸浮液" }selected{/if}>細胞懸浮液
                                                </option>
                                                <option value="其他(請手動輸入樣品種類)" {if $SampleType_4=="其他(請手動輸入樣品種類)"
                                                    }selected{/if}>其他(請手動輸入樣品種類)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="SampleQuantity_4" class="col-md-3 control-label">樣品數量四:</label>
                                        <div class="col-md-8 input-group">
                                            <input type="number" id="SampleQuantity_4" name="SampleQuantity_4"
                                                class="form-control" value="{$SampleQuantity_4}" readonly>
                                            <span class="input-group-addon" id="SampleUnit_4"
                                                readonly>{$SampleUnit_4}</span>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend>樣品五</legend>

                                    <!---- 樣品種類五 ---->
                                    <div class="form-group ">
                                        <label for="SampleType_5" class="col-md-3 control-label">樣品種類五:</label>
                                        <div class="col-md-8">
                                            <select id="SampleType_5" name="SampleType_5" class="form-control"
                                                onchange="updateUnit_5()" disabled>
                                                <option value="">請選擇樣品種類</option>
                                                <option value="EDTA紫頭管-全血" {if $SampleType_5=="EDTA紫頭管-全血"
                                                    }selected{/if}>
                                                    EDTA紫頭管-全血</option>
                                                <option value="Streck cfDNA BCT(迷彩管)-全血" {if
                                                    $SampleType_5=="Streck cfDNA BCT(迷彩管)-全血" }selected{/if}>Streck
                                                    cfDNA
                                                    BCT(迷彩管)-全血</option>
                                                <option value="Streck RNA Complete BCT(橘頭管)-全血" {if
                                                    $SampleType_5=="Streck RNA Complete BCT(橘頭管)-全血" }selected{/if}>
                                                    Streck
                                                    RNA Complete BCT(橘頭管)-全血</option>
                                                <option value="5 ㎛ FFPE玻片(不含圈片)" {if $SampleType_5=="5 ㎛ FFPE玻片(不含圈片)"
                                                    }selected{/if}>5 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="10 ㎛ FFPE玻片(不含圈片)" {if $SampleType_5=="10 ㎛ FFPE玻片(不含圈片)"
                                                    }selected{/if}>10 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="染色圈片" {if $SampleType_5=="染色圈片" }selected{/if}>染色圈片
                                                </option>
                                                <option value="粗針穿刺檢體" {if $SampleType_5=="粗針穿刺檢體" }selected{/if}>粗針穿刺檢體
                                                </option>
                                                <option value="gDNA" {if $SampleType_5=="gDNA" }selected{/if}>gDNA
                                                </option>
                                                <option value="口腔拭子-口腔黏膜細胞" {if $SampleType_5=="口腔拭子-口腔黏膜細胞"
                                                    }selected{/if}>
                                                    口腔拭子-口腔黏膜細胞</option>
                                                <option value="生資分析" {if $SampleType_5=="生資分析" }selected{/if}>生資分析
                                                </option>
                                                <option value="細胞懸浮液" {if $SampleType_5=="細胞懸浮液" }selected{/if}>細胞懸浮液
                                                </option>
                                                <option value="其他(請手動輸入樣品種類)" {if $SampleType_5=="其他(請手動輸入樣品種類)"
                                                    }selected{/if}>其他(請手動輸入樣品種類)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="SampleQuantity_5" class="col-md-3 control-label">樣品數量五:</label>
                                        <div class="col-md-8 input-group">
                                            <input type="number" id="SampleQuantity_5" name="SampleQuantity_5"
                                                class="form-control" value="{$SampleQuantity_5}" readonly>
                                            <span class="input-group-addon" id="SampleUnit_5"
                                                readonly>{$SampleUnit_5}</span>
                                        </div>
                                    </div>
                                </fieldset>



                            </div>
                            <!---- 第三排 ---->

                            <!---- 第三排 ---->
                            <div class="col-md-4">
                                <!---- 簽收人 ---->
                                <div class="form-group">
                                    <label for="Receiving" class="col-md-3 control-label">簽收人:</label>
                                    <div class="col-md-8">
                                        <select id="Receiving" name="Receiving" class="form-control" required disabled>
                                            <option value="">請選擇簽收人</option>
                                            <option value="王許安" {if $Receiving=="王許安" }selected{/if}>王許安</option>
                                            <option value="林庭萱" {if $Receiving=="林庭萱" }selected{/if}>林庭萱</option>
                                            <option value="黃志凱" {if $Receiving=="黃志凱" }selected{/if}>黃志凱</option>
                                            <option value="陳奕勳" {if $Receiving=="陳奕勳" }selected{/if}>陳奕勳</option>
                                            <option value="張本樺" {if $Receiving=="張本樺" }selected{/if}>張本樺</option>
                                        </select>
                                    </div>
                                </div>
                                <!---- 覆核人員 ---->
                                <div class="form-group">
                                    <label for="Receiving2" class="col-md-3 control-label">覆核人員:</label>
                                    <div class="col-md-8">
                                        <select id="Receiving2" name="Receiving2" class="form-control" required
                                            disabled>
                                            <option value="">請選擇覆核人員</option>
                                            <option value="黃志凱" {if $Receiving2=="黃志凱" }selected{/if}>黃志凱</option>
                                            <option value="陳奕勳" {if $Receiving2=="陳奕勳" }selected{/if}>陳奕勳</option>
                                            <option value="張本樺" {if $Receiving2=="張本樺" }selected{/if}>張本樺</option>
                                        </select>
                                    </div>
                                </div>
                                <!---- TAT最終日 ---->
                                <div class="form-group">
                                    <label for="DueDate" class="col-md-3 control-label">TAT最終日:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="DueDate" name="DueDate" class="form-control" required
                                            value="{$DueDate}" readonly>
                                    </div>
                                </div>
                                <!---- 客戶名稱 ---->
                                <div class="form-group">
                                    <label for="CustomerName" class="col-md-3 control-label">聯絡人名稱:</label>
                                    <div class="col-md-8">
                                        <!-- <select id="CustomerName" name="CustomerName" class="form-control" required>
                                            <option value="{$CustomerName}">{$CustomerName}</option>
                                        </select> -->
                                        <input type="text" id="CustomerName" name="CustomerName" class="form-control"
                                            required value="{$CustomerName}" readonly>
                                    </div>
                                </div>
                                <!---- 客戶郵件 ---->
                                <div class="form-group">
                                    <label for="CustomerEmail" class="col-md-3 control-label">聯絡人信箱:</label>
                                    <div class="col-md-8">
                                        <input type="email" id="CustomerEmail" name="CustomerEmail" class="form-control"
                                            required value="{$CustomerEmail}" placeholder="請輸入正確E-mail格式" readonly>
                                    </div>
                                </div>
                                <!---- 客戶郵件2 -->
                                <div class="form-group">
                                    <label for="ccemail" class="col-md-3 control-label">信箱(CC副本):</label>
                                    <div class="col-md-8">
                                        <input type="email" id="ccemail" name="ccemail" class="form-control"
                                            value="{$ccemail}" placeholder="請輸入正確E-mail格式" readonly>
                                    </div>




                                    <!---- 客戶電話 ---->
                                    <div class="form-group">
                                        <label for="CustomerPhone" class="col-md-3 control-label">聯絡電話:</label>
                                        <div class="col-md-8">
                                            <input type="text" id="CustomerPhone" name="CustomerPhone"
                                                class="form-control" required value="{$CustomerPhone}" readonly>
                                        </div>
                                    </div>
                                    <!---- 報告發送狀態 ---->

                                    <div class="form-group">
                                        <label for="ReportStatus" class="col-md-3 control-label">報告進度:</label>
                                        <div class="col-md-8">
                                            <input type="text" id="ReportStatus" name="ReportStatus"
                                                class="form-control" value="{$ReportStatus}" readonly>
                                        </div>
                                    </div>

                                    <!---- 報告退回原因，有值才顯示欄位 ---->
                                    {if $RejectReason}
                                    <div class="form-group">
                                        <label for="RejectReason" class="col-md-3 control-label">報告退回原因:</label>
                                        <div class="col-md-8">
                                            <input type="text" id="RejectReason" name="RejectReason"
                                                class="form-control" value="{$RejectReason}" readonly>
                                        </div>
                                    </div>
                                    {/if}

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Page 2 -->
                    <div id="page2" class="page">
                        <div class="form-horizontal" role="form">

                            <div class="col-md-6">


                                <!---- 實驗室核准 ---->
                                <div class="form-group">
                                    <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="Approved1" class="col-md-3 control-label">核准醫檢師:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved1" name=Approved1 class="form-control" readonly
                                            value="{$Approved1}">
                                    </div>
                                </div>
                                <!---- 醫師核准 ---->
                                <div class="form-group">
                                    <label for="Approved2" class="col-md-3 control-label">核准醫師:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved2" name=Approved2 class="form-control" readonly
                                            value="{$Approved2}">
                                    </div>
                                </div>
                                <!---- 實驗室核准 ---->
                                <div class="form-group">
                                    <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="Reject1" class="col-md-3 control-label">退回醫檢師:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Reject1" name=Reject1 class="form-control" readonly
                                            value="{$Reject1}">
                                    </div>
                                </div>
                                <!---- 醫師核准 ---->
                                <div class="form-group">
                                    <label for="Reject2" class="col-md-3 control-label">退回醫師:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Reject2" name=Reject2 class="form-control" readonly
                                            value="{$Reject2}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!---- 實驗室核准日期 ---->
                                <div class="form-group">
                                    <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="Approved1At" class="col-md-3 control-label">實驗室核准日:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved1At" name=Approved1At class="form-control"
                                            readonly value="{$Approved1At}">
                                    </div>
                                </div>
                                <!---- 醫師核准日期 ---->
                                <div class="form-group">
                                    <label for="Approved2At" class="col-md-3 control-label">醫師核准日:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved2At" name=Approved2At class="form-control"
                                            readonly value="{$Approved2At}">
                                    </div>
                                </div>


                                <!---- 實驗室核准日期 ---->
                                <div class="form-group">
                                    <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="Reject1At" class="col-md-3 control-label">實驗室退回日:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Reject1At" name=Reject1At class="form-control" readonly
                                            value="{$Reject1At}">
                                    </div>
                                </div>

                                <!---- 醫師核准日期 ---->
                                <div class="form-group">
                                    <label for="Reject2At" class="col-md-3 control-label">醫師退回日:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Reject2At" name=Reject2At class="form-control" readonly
                                            value="{$Reject2At}">
                                    </div>
                                </div>

                                <!---- 報告建議/退回原因 ---->
                                <div class="form-group">
                                    <label for="RejectReason" class="col-md-3 control-label">退回原因:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="RejectReason" name=RejectReason class="form-control"
                                            value="{$RejectReason}" readonly>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!---- button area ---->
                    <div>
                        <div id="ds1" align="center">
                            <p id="Message">
                            <div class="alert alert-danger alert-container" id="alert" {$ShowErrorMessage}>
                                <strong>
                                    <center>
                                        <h1>{$ErrorMessage}</h1>
                                    </center>
                                </strong>
                            </div>
                            </p>
                            {if $ReportStatus == '0'}
                            <p id="ReportApproveButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnApproveExit"
                                    name="BtnApproveExit" style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-home"></i> 離 開</button>
                            </p>
                            {elseif $ReportStatus == '1'}
                            <p id="ReportApproveButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnApproveExit"
                                    name="BtnApproveExit" style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-home"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnApproveReject"
                                    name="BtnApproveReject" style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 退 回</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnApprovePass"
                                    name="BtnApprovePass" style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-thumbs-up"></i> 核 准</button>
                            </p>
                            {else}
                            <p id="ReportApproveButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnApproveExit"
                                    name="BtnApproveExit" style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-home"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnApproveReject"
                                    name="BtnApproveReject" style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 退 回</button>

                            </p>
                            {/if}
                        </div>
                    </div>
                        <!---- PDF Preview ---->
                        <div class="row" id="PDFArea">
                            <!-- <div class="form-horizontal" role="form">
                            <div class="col-md-12">
                                <embed id='PDFPreview' name='PDFPreview' src='{$PDFPreview}' type='application/pdf'
                                    width='100%' height='1000px' /> -->
                            <!-- <button type="button" class="btn btn-primary" id="BtnSendEmail">Send Email</button> -->

                            <!-- </div> -->
                            <div class="col-md-12">
                                {if $PDFPreview neq '請再上傳一次報告'}
                                <embed id='PDFPreview' name='PDFPreview' src='{$PDFPreview}' type='application/pdf'
                                    width='100%' height='1000px' />
                                {else}
                                <div class="alert alert-danger alert-container" id="alert" {$PDFPreview}>
                                    <strong>
                                        <center>
                                            <h1>{$PDFPreview}</h1>
                                        </center>
                                    </strong>
                                </div>
                                {/if}
                                <!-- <button type="button" class="btn btn-primary" id="BtnSendEmail">Send Email</button> -->
                            </div>
                        </div>
                        <br>
                        <br>
                        <!---- Apply Preview -->
                        <div class="row" id="ApplyArea">
                            <div class="form-horizontal" role="form">
                                <div class="col-md-12">
                                    <embed id='ApplyFile' name='ApplyFile' src='{$ApplyFile}' type='application/pdf'
                                        width='100%' height='1000px' />
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</form>
<script>
    function checkTestUnit() {
        var testUnit = document.getElementById('test_unit').value;
        var probandNameGroup = document.getElementById('proband_name_group');

        if (testUnit === 'JB_Lab_ISO') {
            probandNameGroup.style.display = 'flex';
        } else {
            probandNameGroup.style.display = 'none';
        }
    }

    function navigatePage(event) {
        event.preventDefault(); // 阻止默认行为
        var currentPage = document.querySelector('.page.active');
        var currentPageId = currentPage.id;
        var navButton = document.getElementById('navButton');

        if (currentPageId === 'page1') {
            showPage(2);
            navButton.innerText = '上一頁';
        } else if (currentPageId === 'page2') {
            showPage(1);
            navButton.innerText = '查看簽核狀態';
        }
    }

    function showPage(pageNumber) {
        var pages = document.querySelectorAll('.page');
        pages.forEach(function (page) {
            page.classList.remove('active');
        });
        document.getElementById('page' + pageNumber).classList.add('active');
    }

    // 初始化时检查一次
    checkTestUnit();
</script>
<script>
    function checkTestUnit() {
        var ReportType = document.getElementById('ReportType').value;
        var probandNameGroup = document.getElementById('proband_name_group');

        if (ReportType === '1') {
            probandNameGroup.style.display = 'flex';
        } else {
            probandNameGroup.style.display = 'none';
        }
    }

    // 初始化时检查一次
    checkTestUnit();
</script>
<!---------------------------End----------------------------->