<!DOCTYPE html>
<html lang="zh-Hant">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Backend Animal</title>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: 'Segoe UI', sans-serif;
                background: #f1f5f9;
                color: #0f172a;
            }

            .nav_ {
                border-bottom: 1px solid #e2e8f0;
                background: #ffffff;
            }

            .nav_inner_ {
                width: 100%;
                max-width: 960px;
                margin: 0 auto;
                padding: 16px 24px;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .nav_title_ {
                font-size: 20px;
                font-weight: 600;
            }

            .nav_link_ {
                display: inline-block;
                padding: 10px 16px;
                border-radius: 999px;
                background: #0f172a;
                color: #ffffff;
                text-decoration: none;
                font-size: 14px;
            }

            .main_ {
                min-height: calc(100vh - 133px);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 48px 24px;
            }

            .card_ {
                width: 100%;
                max-width: 720px;
                padding: 32px;
                border: 1px solid #e2e8f0;
                border-radius: 24px;
                background: #ffffff;
                box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            }

            .eyebrow_ {
                margin: 0 0 8px;
                color: #0369a1;
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.2em;
                text-transform: uppercase;
            }

            .title_ {
                margin: 0;
                font-size: 32px;
                font-weight: 700;
            }

            .description_ {
                margin: 12px 0 24px;
                color: #475569;
                font-size: 14px;
            }

            .label_ {
                display: block;
                margin-bottom: 8px;
                color: #334155;
                font-size: 14px;
                font-weight: 600;
            }

            .field_group_ {
                margin-bottom: 24px;
            }

            .footer_ {
                border-top: 1px solid #e2e8f0;
                background: #ffffff;
            }

            .footer_inner_ {
                width: 100%;
                max-width: 960px;
                margin: 0 auto;
                padding: 16px 24px;
                color: #64748b;
                font-size: 14px;
            }

            .select2-container--default .select2-selection--single {
                height: 48px;
                border: 1px solid #d1d5dc;
                border-radius: 0.75rem;
                padding: 0.45rem 0.75rem;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #111827;
                line-height: 1.75rem;
                padding-left: 0;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 46px;
                right: 0.75rem;
            }

            @media (max-width: 640px) {
                .nav_inner_ {
                    padding: 14px 16px;
                }

                .main_ {
                    padding: 32px 16px;
                }

                .card_ {
                    padding: 24px;
                }

                .title_ {
                    font-size: 26px;
                }
            }
        </style>
    </head>
    <body>
        <nav class="nav_">
            <div class="nav_inner_">
                <div class="nav_title_">Backend Animal</div>
                <a class="nav_link_" href="{{ route('backend.animal') }}">Animal</a>
            </div>
        </nav>

        <main class="main_">
            <section class="card_">
                <div>
                    <p class="eyebrow_">動物設定</p>
                    <h1 class="title_">Animal Select2</h1>
                    <p class="description_">先切換 type，再顯示對應的 `hahaha_config_animal::Initial($type)` 資料。</p>
                </div>

                <form method="get" action="{{ route('backend.animal') }}">
                    <div class="field_group_">
                        <label class="label_" for="type_select">類型</label>
                        <select id="type_select" name="type" class="w-full">
                            <option value="1" @selected($type_ === '1')>陸上動物</option>
                            <option value="2" @selected($type_ === '2')>海上動物</option>
                        </select>
                    </div>

                    <div>
                        <label class="label_" for="animal_select">請選擇動物</label>
                        <select id="animal_select" class="w-full">
                            <option value="">請選擇</option>
                            @foreach ($animal2_ as $animal_key_ => $animal_name_)
                                <option value="{{ $animal_key_ }}">{{ $animal_name_ }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </section>
        </main>

        <footer class="footer_">
            <div class="footer_inner_">
                backend animal footer
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(function () {
                $('#type_select').select2({
                    minimumResultsForSearch: Infinity,
                    width: '100%'
                }).on('change', function () {
                    this.form.submit();
                });

                $('#animal_select').select2({
                    placeholder: '請選擇',
                    width: '100%'
                });
            });
        </script>
    </body>
</html>
