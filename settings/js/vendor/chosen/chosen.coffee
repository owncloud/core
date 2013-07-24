angular.module('localytics.directives', [])

angular.module('localytics.directives').directive 'chosen', ['$timeout', ($timeout) ->
  
  # This is stolen from Angular...
  NG_OPTIONS_REGEXP = /^\s*(.*?)(?:\s+as\s+(.*?))?(?:\s+group\s+by\s+(.*))?\s+for\s+(?:([\$\w][\$\w\d]*)|(?:\(\s*([\$\w][\$\w\d]*)\s*,\s*([\$\w][\$\w\d]*)\s*\)))\s+in\s+(.*)$/

  # Whitelist of options that will be parsed from the element's attributes and passed into Chosen
  CHOSEN_OPTION_WHITELIST = ['noResultsText', 'allowSingleDeselect', 'disableSearchThreshold', 'disableSearch']

  snakeCase = (input) -> input.replace /[A-Z]/g, ($1) -> "_#{$1.toLowerCase()}"
  isEmpty = (value) ->
    if angular.isArray(value)
      return value.length is 0
    else if angular.isObject(value)
      return false for key in value when value.hasOwnProperty(key)
    true

  chosen =
    restrict: 'A'
    link: (scope, element, attr) ->

      # Take a hash of options from the chosen directive
      options = scope.$eval(attr.chosen) or {}

      # Options defined as attributes take precedence
      angular.forEach attr, (value, key) ->
        options[snakeCase(key)] = scope.$eval(value) if key in CHOSEN_OPTION_WHITELIST

      startLoading = -> element.addClass('loading').attr('disabled', true).trigger('liszt:updated')
      stopLoading = -> element.removeClass('loading').attr('disabled', false).trigger('liszt:updated')

      disableWithMessage = (message) ->
        element.empty().append("<option selected>#{message}</option>").attr('disabled', true).trigger('liszt:updated')

      # Init chosen on the next loop so ng-options can populate the select
      $timeout -> element.chosen options

      # Watch the collection in ngOptions and update chosen when it changes.  This works with promises!
      if attr.ngOptions
        match = attr.ngOptions.match(NG_OPTIONS_REGEXP)
        valuesExpr = match[7]

        # There's no way to tell if the collection is a promise since $parse hides this from us, so just
        # assume it is a promise if undefined, and show the loader
        startLoading() if angular.isUndefined(scope.$eval(valuesExpr))
        scope.$watch valuesExpr, (newVal, oldVal) -> 
          unless newVal is oldVal
            stopLoading()
            disableWithMessage(options.no_results_text || 'No values available') if isEmpty(newVal)
]
