<section class="contact-us request-a-call">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 heading">
                <span class="heading-letter-style">{{ __("We call you!") }}</span>
                <div class="main-heading-container">
                    <h1>{{ __("Do you have any questions?") }}</h1>
                    <h3>{{ __("Our advisor will contact you") }}</h3>
                    <p>{{ __("A great investment is based on time and opportunity") }}</p>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 alert-success alert_message"></div>
                    <div class="loader-img" id="loader"><img src="images/loader.gif" alt="loader"
                       class="img-responsive"></div>

                       <form class="row" method="post" action="{{ route('faqForm') }}">

                        {{ csrf_field() }}

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group" {{ $errors->has('nombre') ? 'has-error' : '' }}>
                                <label>{{ __("Name") }} <span class="required">*</span></label>
                                <input placeholder="" name="nombre" class="form-control" type="text" value="{{ old('nombre') }}">
                                {!! $errors->first('nombre', '
                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group" {{ $errors->has('email') ? 'has-error' : '' }}>
                                <label>{{ __("Email") }} <span class="required">*</span></label>
                                <input  name="email" class="form-control" type="text" value="{{ old('email') }}">
                                {!! $errors->first('email', '
                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group" {{ $errors->has('telefono') ? 'has-error' : '' }}>
                                <label>{{ __("Telephone") }} <span class="required">*</span></label>
                                <input placeholder="" name="telefono" class="form-control" type="text" value="{{ old('telefono') }}">
                                {!! $errors->first('telefono', '
                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group" {{ $errors->has('discuss') ? 'has-error' : '' }}>
                                <label>{{ __("I want to discuss") }}<span class="required">*</span></label>
                                <select class="budget form-control" name="discuss">
                                    <option value="">{{ __('Select options') }}</option>
                                    <option value="__('Open an account')">{{ __("Open an account") }}</option>
                                    <option value="__('Market reports')">{{ __("Market reports") }}</option>
                                    <option value="__('Opportunities')">{{ __("Opportunities") }}</option>
                                    <option value="__('Client services')">{{ __("Client services") }}</option>
                                </select>
                                {!! $errors->first('discuss', '
                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="form-group" {{ $errors->has('mensaje') ? 'has-error' : '' }}>
                                <label>{{ __("Message") }} <span class="required">*</span></label>
                                <textarea cols="6" name="mensaje" rows="6" placeholder=""
                                class="form-control">
                                {{ old('mensaje') }}
                            </textarea>
                            {!! $errors->first('mensaje', '
                            <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <input class="btn btn-custom" value="{{ __("Request advice") }}" type="submit">
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-sm-5 col-xs-12 hidden-xs hidden-sm">
                <img src="/pages/images/front.jpg" class="img-responsive" alt="">
            </div>
        </div>
    </div>
</div>
</section>
