<?php
$import = '<pre><code class="prettyprint"># ライブラリを取り込む
import openpyxl as excel
</code></pre>';

$workbook = '<pre><code class="prettyprint"># 新規ワークブックを作る
book = excel.Workbook()

# 既存のExcelファイルの読み込み
book = excel.load_workbook(&quot;ファイル名.xlsx&quot;)

# 式があれば展開してワークブックを開く
book = excel.load_workbook(&quot;ファイル名.xlsx&quot;, data_only=True)

# ワークブックを明示的に閉じる
book.close()
</code></pre>';

$sheet = '<pre><code class="prettyprint"># アクティブなワークシートを得る
sheet = book.active

# n番目のシートを得る
sheet = book.worksheets[n]

# シート名を指定して取得
sheet = book[&quot;シート名&quot;]

# ブック内のシート名の一覧を取得
print(book.sheetnames)

# 新規シートを作成
sheet = book.create_sheet(title=&quot;シート名&quot;)

# 既存のシートをコピーして取得
sheet = book.copy_worksheet(book[&quot;シート名&quot;])

# シート名を変更する
sheet.title = &quot;新しい名前&quot;

# シートを削除
book.remove(book[&quot;シート名&quot;])
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

# 行番号と列番号を指定して値を取得
v = sheet.cell(row=行番号, column=列番号).value
print(v)
</code></pre>';

$save = '<pre><code class="prettyprint"># ファイルを保存
book.save(&quot;hello.xlsx&quot;)
</code></pre>';

$agelist = '<pre><code class="prettyprint">import openpyxl as excel
import datetime

book = excel.Workbook()
sheet = book.active

thisyear = datetime.date.today().year

for i in range(80):
    age = i
    year = thisyear - i

    age_cell = sheet.cell(i+1, 1)
    age_cell.value = str(i) + &quot;歳&quot;
    year_cell = sheet.cell(i+1, 2)
    year_cell.value = str(year) + &quot;年&quot;

    book.save(&quot;agelist.xlsx&quot;)
</code></pre>';

$wareki = '<pre><code class="prettyprint">import openpyxl as excel

# 西暦と和暦の対応テーブル
wareki_table = [
    {&quot;name&quot;: &quot;明治&quot;, &quot;start&quot;: 1868, &quot;end&quot;: 1912},
    {&quot;name&quot;: &quot;大正&quot;, &quot;start&quot;: 1912, &quot;end&quot;: 1926},
    {&quot;name&quot;: &quot;昭和&quot;, &quot;start&quot;: 1926, &quot;end&quot;: 1989},
    {&quot;name&quot;: &quot;平成&quot;, &quot;start&quot;: 1989, &quot;end&quot;: 2019},
    {&quot;name&quot;: &quot;令和&quot;, &quot;start&quot;: 2019, &quot;end&quot;: 9999}
]
# 西暦から和暦へ変換する関数を定義


def seireki_wareki(year):
    for w in wareki_table:
        if w[&quot;start&quot;] &lt;= year &lt; w[&quot;end&quot;]:
            y = str(year - w[&quot;start&quot;] + 1) + &quot;年&quot;
            if y == &quot;1年&quot;:
                y = &quot;元年&quot;
            return w[&quot;name&quot;] + y
    return &quot;不明&quot;


# 新規ワークブックを作る
book = excel.Workbook()
sheet = book.active
# シートのヘッダ部分の説明を入れる
sheet[&quot;A1&quot;] = &quot;西暦&quot;
sheet[&quot;B1&quot;] = &quot;和暦&quot;

# 100年分の西暦和暦の対応表を作る
start_y = 1868
for i in range(180):
    sei = start_y + i
    wa = seireki_wareki(sei)
    # シートに設定
    sheet.cell(row=2+i, column=1, value=str(sei)+&quot;年&quot;)
    sheet.cell(row=2+i, column=2, value=wa)
    print(sei, &quot;=&quot;, wa)

book.save(&quot;wareki.xlsx&quot;)
</code></pre>';

$iter = '<pre><code class="prettyprint"># 行番号と列番号を指定してイテレータを取得
it = sheet.iter_rows(
    min_row=最小行, max_row=最大行,
    min_col=最小列, max_col=最大列
)

# for文と組み合わせてセルの値を取得
for row in it:
    for cell in row:
        print(cell.value)
</code></pre>';

$invoice = '<pre><code class="prettyprint">import openpyxl as excel
template_file = &quot;invoice-template.xlsx&quot;
save_file = &quot;invoice01.xlsx&quot;

name = &quot;株式会社〇〇九州&quot;
subject = &quot;1月分のご請求&quot;
items = [
    [&quot;コンサルティング代金一式&quot;, 1, 120000],
    [&quot;システム構築費&quot;, 1, 200000],
    [&quot;LP制作費&quot;, 4, 25000]
]

book = excel.load_workbook(template_file)
sheet = book.active
sheet[&quot;B4&quot;] = name
sheet[&quot;C10&quot;] = subject

# 内訳を繰り返し書き込んでいく
total = 0
for i, it in enumerate(items):
    summary, count, price = it
    subtotal = count * price
    total += subtotal

    row = 15 + i
    sheet.cell(row, 2, summary)
    sheet.cell(row, 5, count)
    sheet.cell(row, 6, price)
    sheet.cell(row, 7, subtotal)
sheet[&quot;C11&quot;] = total

book.save(save_file)

</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';