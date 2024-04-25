# GeneReport System

## Description
GenoGuardian is a genetic report management system designed for genetic testing laboratories. The system provides a comprehensive report lifecycle management solution, including functions such as adding, uploading, modifying, signing, returning, deleting, and sending reports. GenoGuardian aims to improve the transparency, controllability, and efficiency of the genetic testing process.

GenoGuardian是一個基因報告管理系統，專為基因檢測實驗室設計。該系統提供了一個全面的報告生命周期管理解決方案，包括報告的新增、上傳、修改、簽核、退回、刪除和寄送功能。GenoGuardian旨在提高基因檢測流程的透明度、可控性和效率。


## 功能

- 新增報告：管理者或醫檢師可以新增基因檢測報告的基本資料。
- 上傳結果：基因檢測報告完成後，管理者可以上傳PDF報告。
- Excel批次上傳：支援Excel格式的批次上傳資料功能。
- 修改報告：僅管理者可以修改報告資料或重新上傳報告。
- 刪除報告：管理者具有刪除整筆報告的權限。
- 簽核報告：根據報告樣板，系統判斷是否需要醫檢師或醫檢師和醫師進行簽核。
- 退回報告：醫檢師或醫師可以寫入退回原因並將報告退回，需由管理者重新上傳報告。
- 寄送報告：護理師寄送簽核完成的報告，只能查看需寄送報告的資料。
- Logdata查詢：提供操作紀錄查詢功能，包括狀態: ADD、UPDATE、DELETE、REJECT、PASS、SendMail。


## Installation
To install the dependencies, run the following command:
1. Clone the repository: `git clone https://github.com/eabe8911/GeneReport.git`
2. Navigate to the project directory: `cd reporter/PHPService`
3. docker-compose up

## Programming Language
- 語言：Python、PHP
- 框架：Django
- 數據庫：MySQL
- 前端：HTML、CSS、JavaScript