<header style="border-bottom: 1px solid #ccc; display: flex; padding: 0.5em 1em; justify-content: space-between;">
    <div class="member-site-identity">
        {$Logo}
        <h1 style="font-family:Microsoft JhengHei;">{$LogoName}</h1>
    </div>
    <style>
        select {
            width: 200px;
            height: 30px;
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
    <nav class="member-site-navigation">
        <ul class="nav" style="display: inline-block;">
            {if $Permission eq 1}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 （身分：生資人員）</h3>
            </li>
            {elseif $Permission eq 2}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 （身分：簽核醫檢師）</h3>
            </li>
            {elseif $Permission eq 21}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 （身分：專任ISO簽核醫檢師）</h3>
            </li>
            {elseif $Permission eq 22}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 （身分：專任LDTS簽核醫檢師）</h3>
            </li>
            {elseif $Permission eq 3}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 （身分：醫師）</h3>
            </li>
            {elseif $Permission eq 4}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 （身分：實驗室專人）</h3>
            </li>
            {elseif $Permission eq 5}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 （身分：收檢人員）</h3>
            </li>
            {elseif $Permission eq 6}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 （身分：監控查核人員）</h3>
            </li>
            {else}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 </h3>
            </li>
            {/if}

            

                <!-- {if $Role eq 1}
                <li style="display: inline-block;">
                    <h3>，單位：JB_Lab_ISO</h3>
                </li>
                {elseif $Role eq 2}
                <li style="display: inline-block;">
                    <h3>，單位：JB_Lab_LDTS</h3>
                </li>
                {elseif $Role eq 3}
                <li style="display: inline-block;">
                    <h3>，單位：怡仁所</h3>
                </li>
                {elseif $Role eq 4}
                <li style="display: inline-block;">
                    <h3>，單位：泓采診所</h3>
                </li>
                {elseif $Role eq 5}
                <li style="display: inline-block;">
                    <h3>，單位：新光醫院</h3>
                </li>
                {else}
                <li style="display: inline-block;">
                    <h3> </h3>
                </li>
                {/if} -->




            <!-- <li style="display: inline-block;"><h3>{$DisplayName} 您好</h3></li> -->

            {if $Permission eq 9 }
            <li style="display: inline-block;"><a id="addReport" name="addReport" href="{$addReport}">
                    <h3>新增基本資料</h3>
                </a></li>

            <li style="display: inline-block;"><a id="ImportReport" name="ImportReport" href="{$ImportReport}">
                    <h3>批次匯入基本資料</h3>
                </a></li>

            <li style="display: inline-block;">
                <select id="userOptions" name="userOptions" onchange="location = this.value;">
                    <option value="">會員管理</option>
                    <option value="changePassword.php">更改密碼</option>
                    <option value="log_table.php">紀錄查詢</option>
                    <option value="Statistics.php">統計管理</option>
                    <option value="download.html">下載滿意度問卷</option>
                    {if $Permission eq 9 }
                    <option value="permission.php">使用者權限管理</option>
                    {/if}
                    <option value="index.php">登出</option>
                </select>
            </li>
            {elseif $Permission eq 6}
            <li style="display: inline-block;">
                <select id="userOptions" name="userOptions" onchange="location = this.value;">
                    <option value="">會員管理</option>
                    <option value="changePassword.php">更改密碼</option>
                    <option value="log_table.php">紀錄查詢</option>
                    <option value="Statistics.php">統計管理</option>
                    <option value="download.html">下載滿意度問卷</option>
                    <option value="index.php">登出</option>
                </select>
            </li>
            {elseif $Permission eq 4}
            <li style="display: inline-block;"><a id="addReport" name="addReport" href="{$addReport}">
                    <!-- <h3>新增基本資料</h3> -->
                </a></li>

            <li style="display: inline-block;"><a id="ImportReport" name="ImportReport" href="{$ImportReport}">
                    <h3>批次匯入基本資料</h3>
                </a></li>

            <li style="display: inline-block;">
                <select id="userOptions" name="userOptions" onchange="location = this.value;">
                    <option value="">會員管理</option>
                    <option value="changePassword.php">更改密碼</option>
                    <option value="download.html">下載滿意度問卷</option>
                    <option value="index.php">登出</option>
                </select>
            </li>
            {elseif $Permission eq 2 or $Permission eq 5}
            <li style="display: inline-block;"><a id="addReport" name="addReport" href="{$addReport}">
                    <!-- <h3>新增基本資料</h3> -->
                </a></li>

            <li style="display: inline-block;"><a id="ImportReport" name="ImportReport" href="{$ImportReport}">
                    <h3>批次匯入基本資料</h3>
                </a></li>

            <li style="display: inline-block;">
                <select id="userOptions" name="userOptions" onchange="location = this.value;">
                    <option value="">會員管理</option>
                    <option value="changePassword.php">更改密碼</option>
                    <option value="index.php">登出</option>
                </select>
            </li>



            {else}

            <li style="display: inline-block;">
                <select id="userOptions" name="userOptions" onchange="location = this.value;">
                    <option value="">會員管理</option>
                    <option value="changePassword.php">更改密碼</option>
                    <!-- <option value="log_table.php">紀錄查詢</option> -->
                    <option value="index.php">登出</option>
                </select>
            </li>
            {/if}
        </ul>
    </nav>
</header>