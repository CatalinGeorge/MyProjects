# Generated by Django 2.0.7 on 2018-07-25 11:58

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='products',
            name='image',
            field=models.ImageField(default='noimage.jpg', upload_to='product'),
        ),
    ]