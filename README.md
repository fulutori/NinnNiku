# NinnNiku
Hack Festival Fukuoka(2019/03/09~10)にて制作したPHPのwebアプリケーションです。 
<div style="text-align:center">
    <img src="https://user-images.githubusercontent.com/39111330/54140908-fc7ecf00-4467-11e9-8b30-f309801d0f47.png" title="NinnNikuLogo">
    <div style="font-size:3rem;font-family: fantasy;">NinnNiku</div>
</div>
福岡市内のラーメン店にチェックインし、ポイント獲得を楽しむwebアプリケーションです。

# 依存関係(Dependency)
### 言語
- PHP
- JavaScript
- CSS
### ライブラリ 等
- BootStrap 4
# 使い方（Usage）　 
## トップページ
![cs1_edited](https://user-images.githubusercontent.com/39111330/54142809-d9561e80-446b-11e9-84db-ca8deda297fe.png)
1. 現在地の近くに存在する博多市内のラーメン店を表示します。
2. ラーメン店内（または近く）にいるときチェックインできます。
  初回チェックインで+10Pt、二回目以降のチェックインは+5Ptです。
3. 自身の順位、ほかのユーザーの獲得ポイントを見ることができます。
4. ユーザーのポイント獲得情報により成長していく猫です。
　　下図のようにポイントをためる程猫が(横に広く)成長します。
![neko_grow_up](https://user-images.githubusercontent.com/39111330/54147437-81241a00-4475-11e9-8db7-ef3dc4f0400f.png)
5. 自身のIDと称号です。
6. マイページへ飛ぶことができます。
## マイページ
![cs2_edited](https://user-images.githubusercontent.com/39111330/54142819-da874b80-446b-11e9-9638-1728b288bcd2.png)
1. 自身のIDと称号です。
2. 現在の獲得ポイントです。
3. 称号一覧です。
    称号の色については入手難易度によって変わります。
    |色 |入手難易度 |
    |---|---|
    |緑 |☆☆☆|
    |銅 |★☆☆|
    |銀 |★☆☆|
    |金 |★☆☆|
    |灰 |未入手|
4.過去にチェックインしたラーメン店の履歴が見れます。

# 制作者（Authors）
チーム「犬と魚と鳥」
- :dog: hetsugi
- :fish: ikezaki - [GitHub](https://github.com/izumiikezaki)
- :bird: aokakes - [GitHub](https://github.com/fulutori)
