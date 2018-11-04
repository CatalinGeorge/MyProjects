# Generated by Django 2.1 on 2018-08-13 07:54

import django.core.validators
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0042_auto_20180813_0753'),
    ]

    operations = [
        migrations.AlterField(
            model_name='socials',
            name='facebook',
            field=models.TextField(blank=True, validators=[django.core.validators.URLValidator()]),
        ),
        migrations.AlterField(
            model_name='socials',
            name='google',
            field=models.TextField(blank=True, default='', validators=[django.core.validators.URLValidator()]),
        ),
        migrations.AlterField(
            model_name='socials',
            name='pinterest',
            field=models.TextField(blank=True, default='', validators=[django.core.validators.URLValidator()]),
        ),
        migrations.AlterField(
            model_name='socials',
            name='twitter',
            field=models.TextField(blank=True, default='', validators=[django.core.validators.URLValidator()]),
        ),
        migrations.AlterField(
            model_name='socials',
            name='youtube',
            field=models.TextField(blank=True, default='', validators=[django.core.validators.URLValidator()]),
        ),
    ]