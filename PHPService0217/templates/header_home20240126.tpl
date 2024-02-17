<header style="border-bottom: 1px solid #ccc; display: flex; padding: 0.5em 1em; justify-content: space-between;">
    <div class="member-site-identity">
        {$Logo}
        <h1 style="font-family:Microsoft JhengHei;">{$LogoName}</h1>
    </div>
    <nav class="member-site-navigation">
        <ul class="nav" style="display: inline-block;">
            {if $Permission eq 3}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 （身分：醫師）</h3>
            </li>
            {elseif $Permission eq 2}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 （身分：醫檢師）</h3>
            </li>
            {elseif $Permission eq 1}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 （身分：管理者）</h3>
            </li>
            {else}
            <li style="display: inline-block;">
                <h3>{$DisplayName} 您好 </h3>
            </li>
            {/if}
            {if $Role eq 1}
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
            {/if}




            <!-- <li style="display: inline-block;"><h3>{$DisplayName} 您好</h3></li> -->

            {if $Permission neq 3 and $Permission neq 0 and $Permission neq 4}
            <li style="display: inline-block;"><a id="addReport" name="addReport" href="{$addReport}">
                    <h3>新增報告</h3>
                </a></li>
            <li style="display: inline-block;"><a id="ImportReport" name="ImportReport" href="{$ImportReport}">
                    <h3>批次匯入報告</h3>
                </a></li>
            {/if}

            <li style="display: inline-block;"><a id="logout" name="logout" href="index.php">
                    <h3>登 出</h3>
                </a></li>
        </ul>
    </nav>
</header>