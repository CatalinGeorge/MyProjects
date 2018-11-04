from django.db import models
from django.contrib.auth.models import User
from django.db.models.signals import post_save
from django.core.validators import URLValidator
#for delete
from django.db.models.signals import post_delete
from django.dispatch import receiver
from datetime import datetime
from django.template.defaultfilters import slugify
from tinymce.models import HTMLField






class SingleCategory(models.Model):
    title = models.CharField(max_length=140)

    def __str__(self):
        return self.title


class Companies(models.Model):
    username = models.CharField(max_length = 140)
    email = models.CharField(max_length = 140)
    password = models.TextField()
    date = models.DateTimeField()

    def __str__(self):
        return self.username

class Categories(models.Model):
    name = models.CharField(max_length = 50)
    icon = models.CharField(max_length = 150, blank=True)
    slug = models.SlugField(default='default-cat', max_length=60, blank=True, db_index=True, unique=True)

    def save(self, *args, **kwargs):
        if not self.id:
            #Only set the slug when the object is created.
            self.slug = slugify(self.title) #Or whatever you want the slug to use
        super(Categories, self).save(*args, **kwargs)

    def __str__(self):
        return self.name


class Home_banner(models.Model):
    top_text = models.CharField(max_length = 140)
    mid_text = models.CharField(max_length = 140)
    banner = models.ImageField(max_length=100, upload_to='businesspics/home_banner', default='noimage.jpg')

    def __str__(self):
        return self.top_text

class ContactDetails(models.Model):
    top_title = models.CharField(max_length = 140)
    mid_text = models.CharField(max_length = 140)
    contact = models.CharField(max_length = 140)
    icon = models.ImageField(max_length=100, upload_to='businesspics/contacticons', default='noimage.jpg')

    def __str__(self):
        return self.top_title

class Terms(models.Model):
    title = models.CharField(max_length = 140)
    body = HTMLField()

    def __str__(self):
        return self.title


class Business(models.Model):
    user = models.ForeignKey(User, on_delete=models.CASCADE, related_name='user_select', null=True) 
    category = models.ForeignKey(Categories, on_delete=models.CASCADE, related_name='category_select', null=True)
    title = models.CharField(max_length = 140)
    slug = models.SlugField(max_length=60, blank=True)
    location = models.CharField(max_length = 140)
    phone = models.CharField(max_length=30, blank=True)
    views = models.IntegerField(default="0")
    description = HTMLField()
    image1 = models.ImageField(max_length=100, upload_to='businesspics', default='noimage.jpg')
    image2 = models.ImageField(max_length=100, upload_to='businesspics', default='noimage.jpg')
    image3 = models.ImageField(max_length=100, upload_to='businesspics', default='noimage.jpg')
    image4 = models.ImageField(max_length=100, upload_to='businesspics', default='noimage.jpg')
    image5 = models.ImageField(max_length=100, upload_to='businesspics', default='noimage.jpg')
    date = models.DateTimeField()
    total_votes = models.IntegerField(default="0")
    votes_number = models.IntegerField(default="0")
    coordinates = models.CharField(max_length = 40, default='0')

    def submission_delete(sender, instance, **kwargs):
        instance.file.delete(False) 

    def save(self, *args, **kwargs):
        if not self.id:
            #Only set the slug when the object is created.
            self.slug = slugify(self.title) #Or whatever you want the slug to use
        super(Business, self).save(*args, **kwargs)

    def __str__(self):
        return self.title


   


class CompanyBusiness(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE)
    description = HTMLField()
    address = models.CharField(max_length=100, default='', blank=True)
    website = models.URLField(default='', blank=True)
    phone = models.CharField(max_length=30, default='', blank=True)
    location = models.CharField(max_length=100, default='', blank=True)
    slug = models.SlugField(default='user', max_length=60, blank=True)
    facebook = models.CharField(max_length=100, default='none')
    instagram = models.CharField(max_length=100, default='none')
    linkedin = models.CharField(max_length=100, default='none')
    twitter = models.CharField(max_length=100, default='none')
    image = models.ImageField(max_length=100, upload_to='businessprofile', default='noimage.jpg')

    def save(self, *args, **kwargs):
        if not self.id:
            #Only set the slug when the object is created.
            self.slug = slugify(self.user) #Or whatever you want the slug to use
        super(CompanyBusiness, self).save(*args, **kwargs)

    def __str__(self):
        return self.user.username

def create_profile(sender, **kwargs):
    if kwargs['created']:
        company_business = CompanyBusiness.objects.create(user=kwargs['instance'])

post_save.connect(create_profile, sender=User)


class Chat(models.Model):
    sender = models.ForeignKey(User, on_delete=models.CASCADE, related_name='sender_select', null=True)
    receiver = models.ForeignKey(User, on_delete=models.CASCADE, related_name='receiver_select', null=True)
    business = models.ForeignKey(Business, on_delete=models.CASCADE, related_name='business_select', null=True)
    sender_profile = models.ForeignKey(CompanyBusiness, on_delete=models.CASCADE, related_name='sender_select', null=True)
    message = models.TextField()
    date = models.DateTimeField(default=datetime.now, blank=True)
    status = models.IntegerField(default="0")

    def __str__(self):
        #return str(self.sender)
        return self.message

class ChatReply(models.Model):
    sender = models.ForeignKey(User, on_delete=models.CASCADE, related_name='senderr_select', null=True)
    receiver = models.ForeignKey(User, on_delete=models.CASCADE, related_name='receiverr_select', null=True)
    #chat = models.ForeignKey(Chat, on_delete=models.CASCADE, related_name='chat_select', null=True)
    chat = models.CharField(max_length=50, default="")
    message = models.TextField()
    date = models.DateTimeField()

    def __str__(self):
        #return str(self.sender)  
        return self.message

class Testimonial(models.Model):
    name = models.CharField(max_length=100, default='')
    body = models.TextField()
    image = models.ImageField(max_length=100, upload_to='businessabout', default='noimage.jpg')

    def __str__(self):
        return self.name

class About(models.Model):
    title = models.CharField(max_length=100, default='')
    body = models.TextField()
    image = models.ImageField(max_length=100, upload_to='businessabout', default='noimage.jpg')

    def __str__(self):
        return self.title

class Feedback(models.Model):
    name = models.CharField(max_length = 50)
    email = models.EmailField(max_length = 50)
    message = models.TextField()

    def __str__(self):
        return self.name



class Social(models.Model):
    name = models.CharField(max_length = 50)
    url = models.TextField(validators=[URLValidator()], default="", blank=True)
    icon = models.ImageField(max_length=100, upload_to='businessicons', default='noimage.jpg')

    def __str__(self):
        return self.name

class Service(models.Model):
    title = models.CharField(max_length = 50)
    description = models.TextField()
    image = models.ImageField(max_length=100, upload_to='services', default='noimage.jpg')

    def __str__(self):
        return self.title

class Saved(models.Model):
    user = models.ForeignKey(User, on_delete=models.CASCADE, related_name='usr_select', null=True)
    product = models.ForeignKey(Business, on_delete=models.CASCADE, related_name='product_select', null=True)

    def __str__(self):
        return str(self.product)



class Comment(models.Model):
    text = models.CharField(max_length = 140)
    business_id = models.ForeignKey(Business, on_delete=models.CASCADE, related_name="business", null=True)
    sender = models.ForeignKey(User, on_delete=models.CASCADE, related_name="com_sender", null=True)
    sender_profile = models.ForeignKey(CompanyBusiness, on_delete=models.CASCADE, related_name='sender_comment_select', null=True)
    date = models.DateTimeField(default=datetime.now, blank=True)

    def __str__(self):
        return self.text

class CommentReply(models.Model):
    text = models.CharField(max_length = 140)
    sender = models.ForeignKey(User, on_delete=models.CASCADE, related_name="com_reply_sender", null=True)
    comment_id = models.ForeignKey(Comment, on_delete=models.CASCADE, related_name="comment", null=True)
    sender_profile = models.ForeignKey(CompanyBusiness, on_delete=models.CASCADE, related_name='sender_reply_select', null=True)
    date = models.DateTimeField(null=True, blank=True)

    def __str__(self):
        return self.text

