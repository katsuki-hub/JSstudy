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

$word = '<pre><code class="prettyprint"># python-docxをつかう宣言文
import docx

# 新規ドキュメント作成
doc = docx.Document()

# 既存ワードファイルの読み込み
doc = docx.Document(&#039;ファイル名.docx&#039;)

# Wordファイルへの保存
doc.save(&#039;ファイル名.docx&#039;)
</code></pre>';

$keiyaku = '<pre><code class="prettyprint">import docx
import datetime

template_file = &#039;契約書template.docx&#039;
save_file = &#039;契約書【会社名】.docx&#039;
now = datetime.datetime.now()

card = {
    &#039;■今日の日時&#039;: now.strftime(&#039;%Y年%m月%d日&#039;),
    &#039;■契約会社名&#039;: &#039;〇〇株式会社&#039;,
    &#039;■会社名と名前&#039;: &#039;〇〇株式会社　代表取締役　浦島太郎&#039;,
    &#039;■会社の住所&#039;: &#039;福岡県福岡市博多区〇丁目〇〇&#039;,
    &#039;■契約金&#039;: &#039;金150,000円&#039;,
    &#039;■業務&#039;: &#039;コンサルタント業務請負代金&#039;,
    &#039;■請求の締め日&#039;: &#039;令和4年〇月付け請求書分&#039;,
}

doc = docx.Document(template_file)

for p in doc.paragraphs:
    for k, v in card.items():
        if p.text.find(k) &gt;= 0:
            p.text = p.text.replace(k, v)

doc.save(save_file)
</code></pre>';

$pdf_join = '<pre><code class="prettyprint">from heapq import merge
from pathlib import Path
import PyPDF2

# フォルダのPDFファイル一覧
pdf_dir = Path(&quot;./pdf_files&quot;)
pdf_files = sorted(pdf_dir.glob(&quot;*.pdf&quot;))

# 1つのPDFファイルへ
pdf_join = PyPDF2.PdfFileWriter()
for pdf_file in pdf_files:
    pdf_reader = PyPDF2.PdfFileReader(str(pdf_file))
    for i in range(pdf_reader.getNumPages()):
        pdf_join.addPage(pdf_reader.getPage(i))

# 保存ファイル名
merged_file = pdf_files[0].stem + &quot;-&quot; + pdf_files[-1].stem + &quot;.pdf&quot;

# 保存
with open(merged_file, &quot;wb&quot;)as f:
    pdf_join.write(f)

</code></pre>';

$imagePDF = '<pre><code class="prettyprint">import os
import img2pdf
from traceback import print_exc


def convert_dir(dir_path):
    if os.path.isdir(dir_path):
        pdf_file_path = &quot;{}.pdf&quot;.format(os.path.basename(dir_path))
        pdf_file_path = os.path.join(os.path.dirname(dir_path), pdf_file_path)
    else:
        raise Exception(&quot;invalid path&quot;)

    images_ = []
    print(&quot;scanning directory: {}&quot;.format(dir_path))
    for item in os.listdir(dir_path):
        path_ = os.path.join(dir_path, item)
        if os.path.isfile(path_):
            ext_ = os.path.splitext(path_)[-1].lower()
            if ext_ in [&quot;.jpg&quot;, &quot;.jpeg&quot;, &quot;.png&quot;]:
                images_.append(path_)
            else:
                continue
        else:
            continue

    if len(images_) == 0:
        raise Exception(&quot;no images files&quot;)
    else:
        images_.sort()

    print(&quot;generating pdf file:{} ...&quot;.format(pdf_file_path))
    with open(pdf_file_path, &#039;wb&#039;)as f:
        f.write(img2pdf.convert(images_))


if __name__ == &quot;__main__&quot;:
    try:
        dir_path = &quot;./image_files&quot;
        convert_dir(dir_path)
    except BaseException:
        print_exc()
</code></pre>';

$soup = '<pre><code class="prettyprint"># HTMLの文字列を指定
html_str = &quot;&lt;html&gt;&lt;body&gt;...&lt;/body&gt;&lt;/html&gt;&quot;

# ライブラリの取り込み
from bs4 import BeautifulSoup

# Beautiful Soupで解析を行う
soup = BeautifulSoup(html_str, &#039;html5lib&#039;)

# 出力
print(soup.prettify())
</code></pre>';

$img_download = '<pre><code class="prettyprint">import os
import time
import requests
import urllib
from bs4 import BeautifulSoup

target_url = &#039;ダウンロードしたいサイトのURL&#039;
save_dir = &#039;./image-download&#039;


def download_images():  # メイン処理
    html = requests.get(target_url).text
    urls = get_image_urls(html)
    go_download(urls)


def get_image_urls(html):  # HTMLから画像のURL一覧を取得
    soup = BeautifulSoup(html, &#039;html5lib&#039;)
    res = []
    for img in soup.find_all(&#039;img&#039;):
        src = img[&#039;src&#039;]
        url = urllib.parse.urljoin(target_url, src)
        print(&#039;img.src=&#039;, url)
        res.append(url)
    return res


def go_download(urls):  # 連続でURL一覧をダウンロード
    if not os.path.exists(save_dir):
        os.mkdir(save_dir)
    for url in urls:
        fname = os.path.basename(url)
        save_file = save_dir + &#039;/&#039; + fname
        r = requests.get(url)
        with open(save_file, &#039;wb&#039;)as fp:
            fp.write(r.content)
            print(&quot;save:&quot;, save_file)
        time.sleep(1)


if __name__ == &#039;__main__&#039;:
    download_images()

</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';

$a = '<pre><code class="prettyprint">
</code></pre>';