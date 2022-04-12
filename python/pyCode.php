<?php
$import = '<pre><code class="prettyprint"># ライブラリを取り込む
import openpyxl as excel
</code></pre>';

$workbook = '<pre><code class="prettyprint"># 新規ワークブックを作る
book = excel.Workbook()

# 既存のExcelファイルの読み込み
book = excel.load_workbook(&quot;ファイル名.xlsx&quot;)
</code></pre>';

$sheet = '<pre><code class="prettyprint"># アクティブなワークシートを得る
sheet = book.active

# n番目のシートを得る
sheet = book.worksheets[n]

# シート名を指定して取得
sheet = book[&quot;シート名&quot;]
</code></pre>';

$cell = '<pre><code class="prettyprint"># A1のセルに値を設定
sheet[&quot;A1&quot;] = &quot;こんにちは&quot;

# 行番号と列番号を指定して値を設定(rowとcolumnは1起点)
sheet.cell(row=行番号, column=列番号, value=&quot;こんにちは&quot;)

# 先に任意のセルを取得し、セルに値を設定する方法
cell = sheet.cell(row=行番号, column=列番号)
cell.value = &quot;こんにちは&quot;

# シートの値を読む
print(sheet[&quot;A1&quot;].value)
</code></pre>';

$save = '<pre><code class="prettyprint"># ファイルを保存
book.save(&quot;hello.xlsx&quot;)
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';