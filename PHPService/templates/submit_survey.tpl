
<form action="submit_survey.php" method="post">
    <table>
        <tr>
            <th>Email</th>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <th>送檢單位</th>
            <td><input type="text" name="inspection_unit" required></td>
        </tr>
        <tr>
            <th>報告編號</th>
            <td><input type="text" name="report_number" required></td>
        </tr>
        <tr>
            <th>原樣本代號</th>
            <td><input type="text" name="original_sample_code" required></td>
        </tr>
        <tr>
            <th>檢測項目名稱</th>
            <td><input type="text" name="test_item_name" required></td>
        </tr>
        <tr>
            <th>報告內容滿意度</th>
            <td><input type="number" name="report_content_satisfaction" min="1" max="5" required></td>
        </tr>
        <tr>
            <th>檢測分析處理速度</th>
            <td><input type="number" name="test_analysis_speed" min="1" max="5" required></td>
        </tr>
        <tr>
            <th>服務態度</th>
            <td><input type="number" name="service_attitude" min="1" max="5" required></td>
        </tr>
        <tr>
            <th>解決問題的能力及效率</th>
            <td><input type="number" name="problem_solving_ability_and_efficiency" min="1" max="5" required></td>
        </tr>
        <tr>
            <th>整體服務滿意度</th>
            <td><input type="number" name="overall_service_satisfaction" min="1" max="5" required></td>
        </tr>
        <tr>
            <th>其他意見</th>
            <td><textarea name="other_comments"></textarea></td>
        </tr>
    </table>
    <input type="submit" value="Submit">
</form>