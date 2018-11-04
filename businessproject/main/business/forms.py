from django import forms
from django.contrib.auth.forms import AuthenticationForm 
from django.contrib.auth.forms import UserCreationForm, UserChangeForm
from django.contrib.auth.models import User
from .models import  Chat, ChatReply, Companies, Business, CompanyBusiness, Feedback, Comment, CommentReply
from django.utils.safestring import mark_safe
from datetime import datetime
from tinymce.widgets import TinyMCE
from tinymce.models import HTMLField
from django.template.defaultfilters import slugify




class PictureWidget(forms.widgets.Widget):
    def render(self, name, value, attrs=None):
        html =  Template("""<img src="$link"/>""")
        return mark_safe(html.substitute(link=value))

class FeedbackForm(forms.ModelForm):
    name = forms.CharField( max_length=30, widget=forms.TextInput(attrs={'placeholder': 'Your name'}))
    email = forms.EmailField(max_length=30, widget=forms.TextInput(attrs={'placeholder': 'Your email'}))
    message = forms.CharField(widget=forms.Textarea(attrs={'placeholder': 'Your message'}))

    class Meta:
        model = Feedback
        fields = ('name', 'email', 'message')
        


class ChatForm(forms.ModelForm):
    message = forms.CharField(widget=forms.Textarea(attrs={'placeholder': 'Leave us a message...'}))
    sender = forms.ModelChoiceField(queryset=User.objects.all(),
            widget=forms.HiddenInput())
    receiver = forms.ModelChoiceField(queryset=User.objects.all(),
            widget=forms.HiddenInput())
    business = forms.ModelChoiceField(queryset=Business.objects.all(),
            widget=forms.HiddenInput())
    sender_profile = forms.ModelChoiceField(queryset=CompanyBusiness.objects.all(),
            widget=forms.HiddenInput())

    class Meta:
        model = Chat
        fields = ('message', 'sender', 'receiver', 'business', 'sender_profile' )

class ReplyForm(forms.ModelForm):
    message = forms.CharField(required = False)
    sender = forms.ModelChoiceField(queryset=User.objects.all(),
            widget=forms.HiddenInput())
    receiver = forms.ModelChoiceField(queryset=User.objects.all(),
            widget=forms.HiddenInput())
    chat = forms.CharField(required= False,
            widget=forms.HiddenInput())
    date = forms.DateTimeField(initial=datetime.now, 
        widget=forms.HiddenInput())

    class Meta:
        model = ChatReply
        fields = ('message', 'sender', 'receiver', 'chat', 'date' )

    





class AddBusinessForm(forms.ModelForm):
    title = forms.CharField(label='Title', max_length=100)
    description = HTMLField()
    enctype="multipart/form-data"

    class Meta:
        model = Business
        fields = ('category', 'title','location', 'description', 'image1', 'image2', 'image3', 'image4', 'image5',) 


class LoginForm(AuthenticationForm):
    username = forms.CharField(label="Username", max_length=30, 
                               widget=forms.TextInput(attrs={'class': 'form-control', 'name': 'username'}))
    password = forms.CharField(label="Password", max_length=30, 
                               widget=forms.PasswordInput(attrs={'class': 'form-control', 'name': 'password'}))


class RegistrationForm(UserCreationForm):
    email = forms.EmailField(required=True)

    class Meta:
        model = User
        fields = (
            'username',
            'email',
            'password1',
            'password2'
        )
    
    def save(self, commit=True):
        user = super(RegistrationForm, self).save(commit=False)
        user.email = self.cleaned_data['email']

        if commit:
            user.save()
        
        return user

# class EditProfileForm(UserChangeForm):
#     enctype="multipart/form-data"

#     class Meta:
#         model = User
#         fields = (
#             'email',
#             'first_name',
#             'last_name',
#             'password'
#         )


class EditProfileForm(forms.ModelForm):
    enctype="multipart/form-data"
    description = HTMLField()


    class Meta:
        model = CompanyBusiness
        fields = (
            'description',
            'address',
            'website',
            'phone',
            'location',
            'facebook',
            'instagram',
            'linkedin',
            'twitter',
            'image',
        )
        

class SavedForm(forms.ModelForm):

    class Meta:
        model = Business
        fields = (
            
        )

class RatingForm(forms.Form):

        rating_value = forms.FloatField(required=True, max_value=6, min_value=1, 
        widget=forms.NumberInput())
        
    
    
    #     model = Business
    #     fields = (
    #         'total_votes',
    #     )

  # vote_value = forms.IntegerField(widget=NumberInput(attrs={'type':'range', 'min':'1', 'max':'5'}), required=False)

class EditProductForm(forms.ModelForm):
    description = HTMLField()
    
    def __init__(self, *args, **kwargs):
        super(EditProductForm, self).__init__(*args, **kwargs)
    

    class Meta:
       model = Business
       fields = (
            'title',
            'location',
            'phone',
            'description',
            'image1',
            'image2',
            'image3',
            'image4',
            'image5',
        )
    def save(self):
        instance = super(EditProductForm, self).save(commit=False)
        instance.slug = slugify (instance.title)
        instance.save()

        # strtime = "".join(str(datetime.now()).split("."))
        # instance = super(EditProductForm, self).save(commit=False)
        # string = "%s-%s" % (strtime[7:], instance.title)
        # instance.slug = slugify (string)
        # instance.save()

class CommentForm(forms.ModelForm):
    text = forms.CharField(max_length=100)
    sender = forms.ModelChoiceField(queryset=User.objects.all(),
            widget=forms.HiddenInput())
    business_id = forms.ModelChoiceField(queryset=Business.objects.all(),
            widget=forms.HiddenInput())
    sender_profile = forms.ModelChoiceField(queryset=CompanyBusiness.objects.all(),
            widget=forms.HiddenInput())


    class Meta:
        model = Comment
        fields = ('text', 'sender', 'business_id', 'sender_profile')

class CommentReplyForm(forms.ModelForm):
    # def __init__(self, *args, **kwargs):
    #     super(CommentReplyForm, self).__init__(*args, **kwargs)
    #     self.fields['comment_id'].widget = forms.HiddenInput()

    text = forms.CharField(max_length=100)
    sender = forms.ModelChoiceField(queryset=User.objects.all(),
            widget=forms.HiddenInput())
    comment_id = forms.ModelChoiceField(queryset=Comment.objects.all(),
            widget=forms.HiddenInput())
    sender_profile = forms.ModelChoiceField(queryset=CompanyBusiness.objects.all(),
            widget=forms.HiddenInput())


    class Meta:
        model = CommentReply
        fields = ('text', 'sender', 'sender_profile')
        # widgets = {'comment_id': forms.HiddenInput()}
