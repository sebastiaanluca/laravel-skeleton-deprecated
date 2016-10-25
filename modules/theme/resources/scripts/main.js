import 'font-awesome/scss/font-awesome.scss'
import '../styles/theme.scss'
import 'bootstrap'
import 'bootstrap-datepicker'

//

new Vue({
    created: function () {
        console.log('Vue ready!')
        
        this.initDateInputFields()
    },
    methods: {
        initDateInputFields: function () {
            $('input.input-date').each(function () {
                const locale = $(this).data('locale')
                
                $(this).datepicker({
                    language: locale,
                    format: $(this).data('date-format'),
                    weekStart: locale == 'en' ? 0 : 1,
                    maxViewMode: 1,
                    todayBtn: 'linked',
                    orientation: 'bottom auto',
                    autoclose: true,
                    todayHighlight: true,
                });
            })
        }
    }
})