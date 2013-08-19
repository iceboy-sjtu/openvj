// Generated by CoffeeScript 1.6.3
(function() {
  var freezer, init_step1, init_step2;

  freezer = null;

  init_step1 = function() {
    setTimeout(function() {
      return mass.query('.role-reg-email')[0].focus();
    }, 100);
    $event.on(mass.query('.role-reg-email-confirm'), 'click', function() {
      var target_mail;
      target_mail = mass.query('.role-reg-email')[0].value;
      if (!/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test(target_mail)) {
        $text(mass.query('.reg-hint'), 'Invalid email address ∑(O_O；)');
        return;
      }
      return VJ.ajax({
        action: 'registerstep1',
        data: {
          mail: target_mail
        },
        freezer: freezer,
        onSuccess: function(d) {
          $text(mass.query('.role-email'), target_mail);
          return $fadeout(mass.query('.reg-step1'), 100, function() {
            $style.set(mass.query('.reg-step1'), 'display', 'none');
            $style.set(mass.query('.reg-step1-result'), 'display', 'block');
            return setTimeout(function() {
              return $fadein(mass.query('.reg-step1-result'), 100);
            });
          });
        },
        onFailure: function(d) {
          return $text(mass.query('.reg-hint'), d.errorMsg);
        }
      });
    });
    $event.on(mass.query('.role-reg-email'), 'keypress', function(event) {
      $empty(mass.query('.reg-hint'));
      if (event.which === 13) {
        return jQuery('.role-reg-email-confirm').click();
      }
    });
    return $event.on(mass.query('.role-resend'), 'click', function() {
      return $fadeout(mass.query('.reg-step1-result'), 100, function() {
        $style.set(mass.query('.reg-step1-result'), 'display', 'none');
        $style.set(mass.query('.reg-step1'), 'display', 'block');
        return setTimeout(function() {
          $fadein(mass.query('.reg-step1'), 100);
          return mass.query('.role-reg-email')[0].select();
        });
      });
    });
  };

  init_step2 = function() {
    var dom_password;
    dom_password = mass.query('.role-reg-password');
    $event.on(dom_password, 'focus', function() {
      return this.type = 'text';
    });
    $event.on(dom_password, 'blur', function() {
      return this.type = 'password';
    });
    $event.on(dom_password, 'keyup', function() {
      if (this.value.match(/[^\x00-\xff]/g)) {
        return this.value = this.value.replace(/[^\x00-\xff]/g, '');
      }
    });
    jQuery('input').iCheck();
    return setTimeout(function() {
      return mass.query('.role-reg-nickname')[0].focus();
    }, 100);
  };

  $ready(function() {
    freezer = new VJ.Freezer({
      container: mass.query('.reg-step'),
      dark: true
    });
    $fadein(mass.query('.reg-step'), 1000);
    if (REG_STEP === 1) {
      return init_step1();
    } else if (REG_STEP === 2) {
      return init_step2();
    }
  });

}).call(this);
