<!-- where_togo_area_start  -->
<div class="where_togo_area form-pesquisa shadow">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="form_area">
                    <h3 style="color: #040e27; text-align: center;">Ache sua passagem</h3>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="search_wrap">
                    <form class="search_form" action="{{ url('/search/passagem/') }}">
                        @csrf
                        <div class="input_field">
                            <i class="fa fa-calendar-o icon-input"> </i>
                            <input id="datepicker" placeholder="Data de ida" name="data" required>
                        </div>
                        <div class="input_field input_autocomplete" style="">           
                            <input type="text" class="data-viagem" name="rota" placeholder="Selecione a sua rota" id="input-autocomplete" required>
                        </div>
                        <div class="search_btn">
                            <button class="boxed-btn4 btnSearch" type="submit">
                                <i class="fa fa-search"> </i>
                                Buscar
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- where_togo_area_end  -->
