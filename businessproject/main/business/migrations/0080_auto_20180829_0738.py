# Generated by Django 2.1 on 2018-08-29 07:38

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0079_auto_20180828_1022'),
    ]

    operations = [
        migrations.DeleteModel(
            name='Post',
        ),
        migrations.AddField(
            model_name='business',
            name='slug',
            field=models.SlugField(blank=True, default='no-slug', max_length=60),
        ),
    ]