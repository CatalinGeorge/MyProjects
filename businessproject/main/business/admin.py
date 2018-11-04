from django.contrib import admin
from business.models import *
from django.db import models
from tinymce.models import HTMLField

admin.site.register(Companies)
admin.site.register(Business)
admin.site.register(CompanyBusiness)
admin.site.register(Categories)
admin.site.register(About)
admin.site.register(Feedback)
admin.site.register(Social)
admin.site.register(Service)
admin.site.register(Saved)
admin.site.register(Testimonial)
admin.site.register(Chat)
admin.site.register(ChatReply)
admin.site.register(Home_banner)
admin.site.register(ContactDetails)
admin.site.register(Terms)
admin.site.register(SingleCategory)
admin.site.register(Comment)
admin.site.register(CommentReply)
