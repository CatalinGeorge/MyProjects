# Generated by Django 2.1 on 2018-08-31 07:34

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0086_auto_20180830_1154'),
    ]

    operations = [
        migrations.AddField(
            model_name='companybusiness',
            name='slug',
            field=models.SlugField(blank=True, default='no-slug', max_length=60),
        ),
    ]