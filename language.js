function setLanguage(lang) {
    document.documentElement.lang = lang;
    const elements = document.querySelectorAll('[id]');
    
    elements.forEach(element => {
        const key = element.id;
        const translations = {
            'en': {
                'header-text': 'Haramain Train',
                'form-title': 'Sign-In',
                'username-label': 'Username',
                'password-label': 'Password',
                'signup-text': "Don't have an account? Sign Up",
            },
            'ar': {
                'header-text': 'قطار الحرمين',
                'form-title': 'تسجيل الدخول',
                'username-label': 'اسم المستخدم',
                'password-label': 'كلمة المرور',
                'signup-text': 'لا تملك حساب؟ سجل الآن',
            }
        };

        if (translations[lang] && translations[lang][key]) {
            element.innerText = translations[lang][key];
        }
    });
}



